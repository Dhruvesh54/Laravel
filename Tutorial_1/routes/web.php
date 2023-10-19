<?php

use App\Http\Controllers\Tutorial_1;
use App\Http\Controllers\upload;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// 1. Print your name in controller.
// Route::get('tut1',[Tutorial_1::class,'tut1']);


// ======================================
// 2. Print your name in view.
// Route::view('html','data');

// ======================================
// 3. Call a view from Controller.

// Route::get('tut1',[Tutorial_1::class,'tut1_3']);

// ======================================
// 4. Create a registration form and display the data in the view.
Route::view('reg','Registration');
// Route::post('FetchRegister',[Tutorial_1::class,'tut1_4']);


// ======================================
// 5. Perform validation of form fields.
// Route::view('reg','Registration');
Route::post('FetchRegister',[Tutorial_1::class,'tut1_5']);

// ======================================
// 6. Upload a file and validate the uploaded file and print details of the file uploaded.
// Route::view('data','upload');
Route::get('data',[upload::class,'showUploadForm'])->name('upload');
Route::post('upload',[upload::class,'uploadFile']);



