<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function myposts()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', $user->id)->get();
        return view('dashboard.myposts', compact('posts'));
    }
    
    public function likeposts()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', $user->id)->get();
        return view('dashboard.likeposts', compact('posts'));
    }
}
