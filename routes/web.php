<?php

use App\Http\Controllers\SendMailController;
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
Route::get('ikhan', function(){
    return view('ikhan');
});


Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('/contact-us', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact-us');
Route::get('/mail', [\App\Http\Controllers\ContactController::class, 'saveAndSendMail'])->name('mail');

Route::get('addtocart/{id}', [\App\Http\Controllers\CartController::class, 'addProductToCart'])->name('addtocart');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
