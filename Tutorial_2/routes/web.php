<?php
use App\Http\Controllers\Tutorial_2;
use Illuminate\Support\Facades\Route;

// 1. Configure email settings and send email using the Mail class.
Route::middleware('group')->group(function () {
    Route::view('email_send_form', 'mail_send_form');
});
Route::post('send_email', [Tutorial_2::class, 'tut_2_1']);

// 2. Connect with the database using database.php and env file and create registration table using migration..

// php artisan make:migration create_registration_table
// php artisan migrate

// 3. Insert data into the registration table from model and controller.
Route::view('reg', 'registration');
Route::post('data', [Tutorial_2::class, 'getdata']);

// 4. Demonstrate the use of Seeding.

// php artisan make:seeder StudentSeeder
// php artisan db:seed --class=StudentSeeder

// 5. Demonstrate the use of middleware and its types.
Route::view('success', 'login')->middleware('Student');

// 6. Demonstrate the use of Master view.

Route::view('master','master_layout');