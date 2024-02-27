<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/myposts', [DashboardController::class, 'posts'])->name('dashboard.myposts');

Route::get('/', [PostController::class, 'index'])->name('index');
    
Route::get('/newpost', function () {
    return view('newpost');
})->middleware(['auth', 'verified'])->name('newpost');

Route::post('/newpost', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/result', [PostController::class, 'result'])->name('posts.result');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');

Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('posts.like');

Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('posts.comment');

Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');

Route::post('/contactus', [InquiryController::class, 'submit'])->name('contactus.submit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';