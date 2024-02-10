<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [PostController::class, 'index'])->name('index');
    
Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
});

Route::get('/newpost', function () {
    return view('newpost');
})->middleware(['auth', 'verified'])->name('newpost');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');

Route::post('/contact', function () {
    // ここにお問い合わせフォームの送信処理を追加します。
    // 例えば、メールを送信したり、データベースに保存したりします。
    // このルートは、お問い合わせフォームの送信先として使用されます。
})->name('contact.submit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';