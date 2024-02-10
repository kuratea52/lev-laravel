<?php

use App\Models\Post;

class DashboardController extends Controller
{
    public function posts()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', $user->id)->get();
        return view('dashboard.posts', compact('posts'));
    }
}
?>