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
Route::view('email_send_form','gmail_form');

// Route::view('form_fatch_data', 'formdata');

Route::controller(democontroller::class)->group(function(){
    Route::post('data','getdata');
    Route::get('Fetch_Registration','fetch_registration_data');
// Route::get('Fetch_Registration', [democontroller::class, 'fetch_registration_data']);
Route::get('edit_user/{email}','fetch_data_for_edit');
// Route::get('edit_user/{email}', [democontroller::class, 'fetch_data_for_edit']);
// Route::get('delete_user/{email}','delete_user_registration');
Route::get('Deactivate/{email}','deactivate_user_registration');
Route::get('Activate/{email}','activate_user_registration');

//login
Route::post('login','validation_login');
Route::get('logout','logout');
// Route::post('Update_registration','update_data_registration');

Route::get('delete_user/{email}', 'delete_user_registration');
Route::post('Update_registration','update_data_registration');
});

//Session
Route::view('login_session','form_session');
Route::middleware('session_check')->group(function () {
    Route::view('after_login', 'after_login');
});

Route::post('send_email', [democontroller::class, 'send_email']);