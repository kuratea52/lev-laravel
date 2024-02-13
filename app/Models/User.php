<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

    // いいねした投稿のリレーションを定義
    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')
                    ->withTimestamps() // 中間テーブルにタイムスタンプを追加
                    ->withPivot('id') // 中間テーブルの id カラムを取得
                    ->as('like') // リレーション名を 'like' に変更
                    ->using(Like::class) // 中間テーブルのモデルを指定
                    ->withUnique(['user_id', 'post_id']); // ユニーク制約を追加
    }
}