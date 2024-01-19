<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //外部にあるPostControllerクラスをインポート。

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [
    PostController::class,
    'index'
]);

Route::get('/posts/create', [
    PostController::class,
    'create'
]);

// '/posts'にPostリクエストが来たら、PostController.phpのstoreメソッドを実行する。
Route::post('/posts', [
    PostController::class,
    'store'
]);

// '/posts/{対象データのID}'にGetリクエストが来たら、PostController.phpのshowメソッドを実行する。
Route::get('/posts/{post}', [
    PostController::class,
    'show'
]);

Route::put('/posts/{post}', [
    PostController::class,
    'update'
]);

// '/posts/{対象データのID}'にDeleteリクエストが来たら、PostController.phpのdeleteメソッドを実行する。
Route::delete('/posts/{post}', [
    PostController::class,
    'delete'
]);

Route::get('/posts/{post}/edit', [
    PostController::class,
    'edit'
]);