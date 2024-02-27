<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        // バリデーション
        $validatedData = $request->validated();

        // コメントをデータベースに保存
        $comment = Comment::create([
            'content' => $validatedData['content'],
            'post_id' => $validatedData['post_id'],
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('posts.show', $post->id);
    }
}
