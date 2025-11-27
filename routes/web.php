<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/', [PostController::class, 'index']);

// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
// Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');

Route::resource('posts', controller: PostController::class)->names('posts');
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);

















Route::get('/posts/category/{category}', [PostController::class, 'postsByCategory'])->name('posts.byCategory');
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


//admin
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/admin/posts', [PostController::class, 'admin'])->name('posts.admin');

// Route::put('/admin', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/admin', [PostController::class, 'destroy'])->name('posts.destroy');

//single post
Route::get('/posts/{id}/admin', [PostController::class, 'show'])->name('posts.show.admin');

//category routes
// Route::get('/category/{id}', function () {
//     return view('category-post');
// })->name('category-post');

// Route::get('test', function () {
//     $post = Posts::with('category')
//     ->where('id', operator: 1)
//     ->get();

//     foreach ($post as $p) {
//         echo 'Post Title: ' . $p->title . '<br>';
//         echo 'Category: ' . $p->category->name . '<br><br>';
//     }

    // dd($post);



// })->name('test');

//tags
// Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
