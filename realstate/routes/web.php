<?php

use App\Http\Controllers\democontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

// Route::get('/agent/dashboard', [AgentController::class, 'AgentDshboard'])->name('agent.dashboard');

// Route::get('/user/dashboard', [UserController::class, 'UserDshboard'])->name('user.dashboard');


Route::view('index', 'home');
Route::view('service', 'service');
Route::view('gallery', 'gallery');
Route::view('/registration', 'form');


// Route::view('form_fatch_data', 'formdata');
Route::post('data', [democontroller::class, 'getdata']);
// Route::post('form_fatch', [democontroller::class, 'validation']);
