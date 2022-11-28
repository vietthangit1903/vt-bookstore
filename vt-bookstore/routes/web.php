<?php

use App\Http\Controllers\Admin\AuthorsController;
use App\Http\Controllers\Admin\BookAdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PublishersController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\GuestRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'getView'])->name('home');
Route::get('/categories', [HomeController::class, 'categoriesList'])->name('categories-list');
Route::get('/ajaxCart', [CartController::class, 'ajaxCart'])->name('ajax-cart');
Route::get('/book-list', [BookListController::class, 'showBookList'])->name('book-list');
Route::get('/book-list/search', [BookListController::class, 'search'])->name('search-book');
Route::get('/book-list/category/{id}', [BookListController::class, 'bookByCategory'])->name('bookByCategory');

Route::get('/book-detail/{book_id}', [BookController::class, 'showBook'])->name('bookDetail');
Route::post('/add-to-cart', [CartController::class, 'addSingleBook'])->name('addSingleBook');


Route::prefix('/auth')->group(function () {
    Route::get('/login', [LoginController::class, 'ShowLoginForm'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'Login']);

    Route::view('/guest/register', 'auth.register')->name('guest.register');
    Route::post('/guest/register', [GuestRegisterController::class, 'RegisterGuest'])->name('guest.register');

    Route::get('/logout', [LoginController::class, 'Logout'])->name('auth.logout');

    Route::get('/google', [GoogleAuthController::class, 'Redirect'])->name('auth.google');
    Route::get('/google/callback', [GoogleAuthController::class, 'Callback'])->name('auth.google.callback');
});

Route::prefix('/user')->middleware('auth')->group(function () {
    Route::get('my-account', [UserController::class, 'showUserAccount'])->name('my-account');
    Route::view('/my-account/edit', 'user.edit-account')->name('edit-my-account');
    Route::post('/my-account/edit', [UserController::class, 'updateUserInfor'])->name('edit-my-account');
    Route::view('/change-password', 'auth.changePassword')->name('change-password');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');

    Route::get('/address', [UserController::class, 'showAddressView'])->name('user-address');
    Route::post('/address', [UserController::class, 'saveAddress'])->name('user-address');
    Route::post('/address/delete', [UserController::class, 'deleteAddress'])->name('user-delete-address');
    Route::view('/cart', 'cart')->name('cart');
    Route::post('/delete-cart-detail', [CartController::class, 'deleteSingleCartDetail'])->name('user.deleteSingleCartDetail');
});

Route::prefix('/admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::get('/categories', [CategoriesController::class, 'showCategories'])->name('categories');
    Route::post('/categories', [CategoriesController::class, 'saveCategory'])->name('add-category');
    Route::post('/categories/delete', [CategoriesController::class, 'deleteCategory'])->name('delete-category');

    Route::get('/authors', [AuthorsController::class, 'showAuthors'])->name('authors');
    Route::post('/authors', [AuthorsController::class, 'saveAuthor'])->name('authors');
    Route::post('/authors/delete', [AuthorsController::class, 'deleteAuthor'])->name('delete-authors');

    Route::get('/publishers', [PublishersController::class, 'showPublishers'])->name('publishers');
    Route::post('/publishers', [PublishersController::class, 'savePublisher'])->name('publishers');
    Route::post('/publishers/delete', [PublishersController::class, 'deletePublisher'])->name('delete-publisher');

    Route::get('/books', [BookAdminController::class, 'showBooks'])->name('books');
    Route::get('/book/add', [BookAdminController::class, 'showAddBook'])->name('add-book');
    Route::post('/book/add', [BookAdminController::class, 'addBook'])->name('add-book');
    Route::get('/book/update', [BookAdminController::class, 'showAddBook'])->name('update-book');
    Route::post('/book/update', [BookAdminController::class, 'saveEditBook'])->name('update-book');
    Route::post('/book/delete', [BookAdminController::class, 'deleteBook'])->name('delete-book');
    Route::post('/book/deleteImg', [BookAdminController::class, 'deleteBookImage'])->name('delete-image');
});
