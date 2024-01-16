<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;

// class PostController extends Controller
// {
//     public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
//     {
//         return $post->get();//$postの中身を戻り値にする。
//     }
// }

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    // getPaginateByLimit()はPost.phpで定義したメソッド。
    }
}
?>