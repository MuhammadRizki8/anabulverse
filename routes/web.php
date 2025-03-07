<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\PawLikeController;

Route::post('/paw-likes', [PawLikeController::class, 'store'])->name('paw-likes.store');

// Route Homepage
Route::get('/', [PostController::class, 'home'])->name('home');

// Resource Route untuk Post
Route::resource('posts', PostController::class);

// Route Show Post (Detail)
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Route untuk Menyimpan Komentar
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');


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
