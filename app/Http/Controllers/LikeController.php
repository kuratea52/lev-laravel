<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($postId)
    {
        // ユーザーが既にその投稿にいいねをしているか確認する
        $existingLike = Like::where('user_id', auth()->user()->id)
                            ->where('post_id', $postId)
                            ->first();
        
        // 既にいいねしている場合は何もしない
        if ($existingLike) {
            return response()->json(['error' => '既にいいねしています。', 'alreadyLiked' => true]);
        }
        
        // 新しいいいねを作成する
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $like->post_id = $postId;
        $like->save();
        
        // 投稿のlikesカラムをインクリメントする
        Post::where('id', $postId)->increment('likes');
        
        // 成功したらリダイレクトするなどの処理を行う
        return response()->json(['success' => 'いいねしました。', 'alreadyLiked' => false]);
    }
    
    public function unlike($postId)
    {
        // ユーザーがその投稿にいいねをしているか確認する
        $existingLike = Like::where('user_id', auth()->user()->id)
                            ->where('post_id', $postId)
                            ->first();
        
        // いいねが存在する場合は削除する
        if ($existingLike) {
            $existingLike->delete();
    
            // 投稿のlikesカラムをデクリメントする
            Post::where('id', $postId)->decrement('likes');
    
            return response()->json(['success' => 'いいねを取り消しました。']);
        } else {
            return response()->json(['error' => 'いいねが見つかりません。']);
        }
    }
    
    public function checkLike(Post $post)
    {
        // ユーザーがログインしていることを確認するか、必要な認証を行う

        // ログインユーザーがこの投稿に対していいねをしたかどうかを確認する
        $user = auth()->user();
        $alreadyLiked = Like::where('post_id', $post->id)
                            ->where('user_id', $user->id)
                            ->exists();

        return response()->json(['alreadyLiked' => $alreadyLiked]);
    }
}