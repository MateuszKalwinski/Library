<?php

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


Auth::routes([

    'register' => true, // Register Routes...

    'reset' => false, // Reset Password Routes...

    'verify' => false, // Email Verification Routes...

]);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');
    Route::post('/books/list', [App\Http\Controllers\BookController::class, 'list'])->name('books-list');
    Route::get('/books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books-create');
    Route::post('/books/store', [App\Http\Controllers\BookController::class, 'store'])->name('books-store');
    Route::get('/books/edit/{book}', [App\Http\Controllers\BookController::class, 'edit'])->name('books-edit');
    Route::patch('/books/update/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('books-update');
    Route::delete('/books/destroy/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books-destroy');

    Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories-create');
    Route::post('/categories/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories-store');
    Route::get('/categories/edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories-edit');
    Route::patch('/categories/update/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories-update');
    Route::delete('/categories/destroy/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories-destroy');

    Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
    Route::patch('/update-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

    Route::get('/', function () {
        return redirect()->route('books');
    });

});



