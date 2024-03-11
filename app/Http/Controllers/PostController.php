<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        
        $searchResults = Post::where('is_public', 1)
                             ->where(function($query) use ($keyword) {
                                 $query->where('title', 'like', '%' . $keyword . '%')
                                       ->orWhere('content', 'like', '%' . $keyword . '%')
                                       ->orWhere('region', 'like', '%' . $keyword . '%')
                                       ->orWhere('season', 'like', '%' . $keyword . '%')
                                       ->orWhere('participants', 'like', '%' . $keyword . '%')
                                       ->orWhere('budget', 'like', '%' . $keyword . '%')
                                       ->orWhere('stay_duration', 'like', '%' . $keyword . '%');
                             })
                             ->paginate(9);
                             
        return view('posts.result', compact('searchResults', 'keyword'));
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
        
        // コメントをページネーションして取得
        $comments = $post->comments()->paginate(5);

        return view('posts.show', compact('post', 'isFromSearch', 'searchKeyword', 'comments'));
    }
    
    public function store(PostRequest $request)
    {
        // バリデーション済みのデータを取得
        $validatedData = $request->validated();

        // ログインユーザーのIDを設定
        $validatedData['user_id'] = auth()->id();
        
        // 画像を保存してパスを取得
        $imagePaths = [];
        for ($i = 1; $i <= 3; $i++) {
            if ($request->hasFile("image_$i")) {
                // 「/storage/app/public/img」配下に保存される
                $path = $request->file("image_$i")->store('public/img');
                $imagePaths["image_path_$i"] = Storage::url($path);
            }
        }
        
        // 画像のパスをバリデート済みデータにマージ
        $validatedData = array_merge($validatedData, $imagePaths);
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
        // バリデーション済みのデータを取得
        $validatedData = $request->validated();
        
        // 画像の削除処理
        for ($i = 1; $i <= 3; $i++) {
            if ($request->has("delete_image_$i")) {
                Storage::delete($post->{"image_path_$i"});
                $post->{"image_path_$i"} = null;
            }
        }
        
        // 画像の変更処理
        $imagePaths = [];
        for ($i = 1; $i <= 3; $i++) {
            // 新しい画像がアップロードされた場合の処理
            if ($request->hasFile("change_image_$i")) {
                $path = $request->file("change_image_$i")->store('public/img');
                $imagePaths["image_path_$i"] = Storage::url($path);
            }
        }
        
        $dataToUpdate = array_merge($validatedData, $imagePaths);
        $post->update($dataToUpdate);
        
        return redirect()->route('posts.show', $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard');
    }
}