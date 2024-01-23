<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [
    PostController::class,
    'index'
])->name('index');

Route::get('/posts/create', [
    PostController::class,
    'create'
]);

Route::post('/posts', [
    PostController::class,
    'store'
]);

Route::get('/posts/{post}', [
    PostController::class,
    'show'
]);

Route::put('/posts/{post}', [
    PostController::class,
    'update'
]);

Route::delete('/posts/{post}', [
    PostController::class,
    'delete'
]);

Route::get('/posts/{post}/edit', [
    PostController::class,
    'edit'
]);

Route::get('/categories/{category}', [
    CategoryController::class,
    'index'
]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
