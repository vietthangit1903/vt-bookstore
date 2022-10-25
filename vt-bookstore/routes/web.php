<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\FacebookAuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\GuestRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\UserController;
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

Route::prefix('/auth')->group(function () {
    Route::get('/login', [LoginController::class, 'ShowLoginForm'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'Login']);

    Route::view('/guest/register', 'auth.register')->name('guest.register');
    Route::post('/guest/register', [GuestRegisterController::class, 'RegisterGuest'])->name('guest.register');

    Route::get('/logout', [LoginController::class, 'Logout'])->name('auth.logout');

    Route::get('/google', [GoogleAuthController::class, 'Redirect'])->name('auth.google');
    Route::get('/google/callback', [GoogleAuthController::class, 'Callback'])->name('auth.google.callback');

});

Route::view('/', 'home')->name('home');

Route::prefix('/user')->middleware('auth')->group(function(){
    Route::get('my-account',[UserController::class, 'showUserAccount'])->name('my-account');
    Route::view('/change-password', 'auth.changePassword')->name('change-password');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');

});

Route::get('/cart', function () {
    return view('cart');
})->name('cart');
