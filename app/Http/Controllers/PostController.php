<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'region' => 'required|string',
            'season' => 'required|string',
            'participants' => 'required|string',
            'budget' => 'required|string',
            'stay_duration' => 'required|string',
            'content' => 'required|string',
        ]);
        
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->region = $validatedData['region'];
        $post->season = $validatedData['season'];
        $post->participants = $validatedData['participants'];
        $post->budget = $validatedData['budget'];
        $post->stay_duration = $validatedData['stay_duration'];
        $post->content = $validatedData['content'];
        $post->user_id = auth()->id(); // 現在のログインユーザーのIDを保存
        $post->save();
        
        return redirect()->route('posts.show', $post->id);
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