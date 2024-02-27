<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        // コメントをデータベースに保存
        Comment::create([
            'content' => $request->input('content'),
            'post_id' => $request->input('post_id'),
            'user_id' => auth()->user()->id, // ログインユーザーのIDを取得
        ]);

        // リダイレクトまたはJSONレスポンスなど、適切な応答を返す
        return redirect()->back()->with('success', 'コメントが投稿されました');
    }
}
