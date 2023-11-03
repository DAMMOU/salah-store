<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('/contact-us', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact-us');
Route::post('/contact-us', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact-us.store');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
