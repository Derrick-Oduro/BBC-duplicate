<?php

use App\Models\Post;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::get('/', [PostController::class, 'index']);

// Route::get('/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
// Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{id}/edit', [PostController::class, 'update'])->name('posts.update');

Route::resource('posts', PostController::class);

Route::get('/posts/category/{category}', [PostController::class, 'postsByCategory'])->name('posts.byCategory');




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


Route::get('test', function () {
    $post = Post::with('category')
    ->where('id', operator: 1)
    ->get();

    foreach ($post as $p) {
        echo 'Post Title: ' . $p->title . '<br>';
        echo 'Category: ' . $p->category->name . '<br><br>';
    }

    // dd($post);
    


})->name('test');
