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


    Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post-create');
    Route::post('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post-create');
    Route::get('/posts' . '/{id?}', [App\Http\Controllers\PostController::class, 'index'])->name('posts');

    Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories-create');
    Route::post('/categories/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories-store');
    Route::get('/categories/edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories-edit');
    Route::patch('/categories/update/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories-update');
    Route::delete('/categories/destroy/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories-destroy');

    Route::get('/', function () {
        return redirect()->route('posts');
    });

});



