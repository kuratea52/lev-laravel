<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // likesテーブルとのリレーション
    public function likedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'likes')
                    ->withTimestamps()
                    ->withPivot('id')
                    ->as('like');
    }
    
    // commentsテーブルとのリレーション
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    
    // ユーザーが投稿した投稿を取得する関連メソッド
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    // ユーザーが受け取ったいいねを取得する関連メソッド
    public function receivedLikes()
    {
        return $this->hasMany(Like::class, 'who');
    }
}