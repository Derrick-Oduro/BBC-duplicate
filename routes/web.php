<?php

use App\Http\Controllers\PostController;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

Route::get('/', [PostController::class, 'index']);

Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::resource('posts', PostController::class);


Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}/edit', [PostController::class, 'update'])->name('posts.update');


//category routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


//admin
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/admin', [PostController::class, 'index'])->name('posts.index');
Route::put('/admin', [PostController::class, 'update'])->name('posts.update');
Route::delete('/admin', [PostController::class, 'destroy'])->name('posts.destroy');

//single post
Route::get('/posts/{id}/admin', [PostController::class, 'show'])->name('posts.show.admin');

//category routes
Route::get('/category/{id}', function () {
    return view('category-post');
})->name('category-post');
