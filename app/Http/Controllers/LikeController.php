<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($postId)
    {
        // ユーザーが既にその投稿にいいねをしているか確認する
        $existingLike = Like::where('user_id', auth()->user()->id)
                            ->where('post_id', $postId)
                            ->first();
        
        // 既にいいねしている場合は何もしない
        if ($existingLike) {
            return redirect()->back()->with('error', '既にいいねしています。');
        }
        
        // 新しいいいねを作成する
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $like->post_id = $postId;
        $like->save();
        
        // 成功したらリダイレクトするなどの処理を行う
        return redirect()->back()->with('success', 'いいねしました。');
    }
}