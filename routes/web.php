<?php

use Illuminate\Support\Facades\Route;

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
 
Auth::routes();

Route::get('/', [App\Http\Controllers\QuizController::class, 'index'])->name('index');

Route::get('/quiz', [App\Http\Controllers\QuizController::class, 'quiz'])->name('quiz');
Route::post('/quiz/submit', [App\Http\Controllers\QuizController::class, 'submit']);
Route::post('/quiz/question/skip', [App\Http\Controllers\QuizController::class, 'questionSkip']); 
Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);

