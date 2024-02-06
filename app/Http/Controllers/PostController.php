<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $totalLikesRanking = Post::getTotalLikesRanking();
        $kantoRanking = Post::getRankingByRegion('関東');
        $springRanking = Post::getRankingBySeason('春');
        $oneParticipantLikesRanking = Post::getLikesRankingByParticipants('１人');
        $budgetLikesRanking = Post::getLikesRankingByBudget('～３万円');
        $dayTripLikesRanking = Post::getLikesRankingByStayDuration('日帰り');
        $posts = $post->getByLimit();
        
        return view('index', compact(
            'totalLikesRanking',
            'kantoRanking',
            'springRanking',
            'oneParticipantLikesRanking',
            'budgetLikesRanking',
            'dayTripLikesRanking',
            'posts'));
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function store(Post $post, PostRequest $request)
    {
        // $input = $request['post'];   // PostRequestクラスの処理をした$requestからキーがpostのものを$inputに代入
        $validatedData = $request->validated();
        $post->fill($input)->save();   // Postクラスのfillメソッドとsaveメソッドを呼び出している
        return redirect('/posts/' . $post->id);   // このURLはつまりshow.blade.phpと同じページを表示している
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        // $input_post = $request['post'];
        $validatedData = $request->validated();
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