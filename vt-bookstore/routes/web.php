<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\GuestRegisterController;
use App\Http\Controllers\Auth\LoginController;
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

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'ShowLoginForm'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'Login']);

    Route::view('/guest/register', 'auth.register')->name('guest.register');
    Route::post('/guest/register', [GuestRegisterController::class, 'RegisterGuest'])->name('guest.register');

    Route::get('/logout', [LoginController::class, 'Logout'])->name('auth.logout');

    Route::get('/google', [GoogleAuthController::class, 'Redirect'])->name('auth.google');
    Route::get('/google/callback', [GoogleAuthController::class, 'Callback'])->name('auth.google.callback');

});

Route::view('/', 'home')->name('home');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');
