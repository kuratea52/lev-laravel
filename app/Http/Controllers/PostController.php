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
        // 検索キーワードを削除する
        session()->forget('search_keyword');
        
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
        session()->put('search_keyword', $keyword);
        
        $searchResults = Post::where('title', 'like', '%' . $keyword . '%')
                             ->orWhere('content', 'like', '%' . $keyword . '%')
                             ->orWhere('region', 'like', '%' . $keyword . '%')
                             ->orWhere('season', 'like', '%' . $keyword . '%')
                             ->orWhere('participants', 'like', '%' . $keyword . '%')
                             ->orWhere('budget', 'like', '%' . $keyword . '%')
                             ->orWhere('stay_duration', 'like', '%' . $keyword . '%')
                             ->paginate(9);
                             
        return view('posts.result', compact('searchResults'));
    }
    
    public function show(Post $post)
    {
        // 検索結果からの遷移かどうかを判定するための変数
        $isFromSearch = session()->has('search_keyword');
        
        // 検索結果からの遷移の場合は、セッションから検索キーワードを削除しない
        if ($isFromSearch) {
            $searchKeyword = session('search_keyword');
        } else {
            $searchKeyword = null;
        }
    
        return view('posts.show', compact('post', 'isFromSearch', 'searchKeyword'));
    }
    
    public function store(PostRequest $request)
    {
        // バリデーション済みのデータを取得
        $validatedData = $request->validated();
        
        // ログインユーザーのIDを設定
        $validatedData['user_id'] = auth()->id();
    
        // Postモデルのインスタンスを作成してデータを保存
        $post = Post::create($validatedData);
        
        return redirect()->route('posts.show', $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());
        
        return redirect()->route('posts.show', $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard');
    }
}