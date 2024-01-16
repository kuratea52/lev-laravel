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

// '/posts/{対象データのID}'にGetリクエストが来たら、PostController.phpのshowメソッドを実行する。
Route::get('/posts/{post}', [
    PostController::class,
    'show'
]);