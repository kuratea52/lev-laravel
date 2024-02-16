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
            'posts'
        ));
    }
    
    public function result(Request $request)
    {
        $keyword = $request->input('keyword');
        $searchResults = Post::where('title', 'like', '%' . $keyword . '%')
                             ->orWhere('content', 'like', '%' . $keyword . '%')
                             ->orWhere('region', 'like', '%' . $keyword . '%')
                             ->orWhere('season', 'like', '%' . $keyword . '%')
                             ->orWhere('participants', 'like', '%' . $keyword . '%')
                             ->orWhere('budget', 'like', '%' . $keyword . '%')
                             ->orWhere('stay_duration', 'like', '%' . $keyword . '%')
                             ->get();
        
        return view('posts.result', compact('searchResults'));
    }
    
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
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
            'is_public' => 'boolean', // 公開可否をブール値としてバリデーション
        ]);
        
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->region = $validatedData['region'];
        $post->season = $validatedData['season'];
        $post->participants = $validatedData['participants'];
        $post->budget = $validatedData['budget'];
        $post->stay_duration = $validatedData['stay_duration'];
        $post->content = $validatedData['content'];
        $post->is_public = $validatedData['is_public']; // 公開可否の値を保存
        $post->user_id = auth()->id(); // 現在のログインユーザーのIDを保存
        $post->save();
        
        return redirect()->route('posts.show', $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $validatedData = $request->validated();
        
        $post->fill($validatedData);
        $post->save();
        
        return redirect()->route('posts.show', $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}