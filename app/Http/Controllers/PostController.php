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
        //Viewを返却するときは、return文の指定をview('Bladeファイル名の「.blade.php」より前の部分')と記載する。
        //（BladeファイルがViewsフォルダの直下にない場合は、Views以降の相対パスを記載）
        return view('posts.index')->with(['posts' => $post->getByLimit()]);  
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
}
?>