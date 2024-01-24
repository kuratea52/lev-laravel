<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Post $post)
    {
        // return view('index')->with(['posts' => $post->getPaginateByLimit()]);
        
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();
        
        // GET通信するURL
        $url = 'https://teratail.com/api/v1/questions';
        
        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        // index bladeに取得したデータを渡す
        return view('index')->with([
            'posts' => $post->getPaginateByLimit(),
            'questions' => $questions['questions']
        ]);
    }
    
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
        // Viewファイル「create」内のcategories変数に、
        // Categoryモデルから生成されたcategoryインスタンスのgetメソッド（すべてのカテゴリを取得）を処理した値を格納する。
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