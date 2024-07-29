<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TeachersController::class, 'teachers_login'])->middleware('alreadyLoggedIn');
Route::get('/login', [TeachersController::class, 'teachers_login'])->middleware('alreadyLoggedIn');
Route::post('/login', [TeachersController::class, 'teachers_login_post'])->middleware('alreadyLoggedIn');
Route::get('/dashboard', [TeachersController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [TeachersController::class, 'logout'])->middleware('isLoggedIn');
Route::post('/create', [StudentController::class, 'create'])->middleware('isLoggedIn');
Route::post('/get_student', [StudentController::class, 'get_student'])->middleware('isLoggedIn');
Route::post('/student_post', [StudentController::class, 'student_post'])->middleware('isLoggedIn');
Route::get('/student_del/{id}/{student_name}/{subject}', [StudentController::class, 'student_del'])->middleware('isLoggedIn');


Route::get('/result', [StudentController::class, 'result']);
Route::post('/result', [StudentController::class, 'results']);
Route::get('/registration', [TeachersController::class, 'registration']);
Route::post('/registration', [TeachersController::class, 'registration_post']);

