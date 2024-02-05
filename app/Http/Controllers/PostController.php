<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Post $post)
    {
        // $posts = Post::orderBy('updated_at', 'DESC')->paginate(10);
        $kantoRanking = Post::getRankingByRegion('関東');
        $posts = $post->getByLimit();
        return view('index', compact('kantoRanking', 'posts'));
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];   // PostRequestクラスの処理をした$requestからキーがpostのものを$inputに代入
        $post->fill($input)->save();   // Postクラスのfillメソッドとsaveメソッドを呼び出している
        return redirect('/posts/' . $post->id);   // このURLはつまりshow.blade.phpと同じページを表示している
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
?>