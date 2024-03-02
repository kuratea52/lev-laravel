<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['content', 'post_id', 'user_id'];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public static function getPaginatedComments($postId, $perPage = 5)
    {
        return static::where('post_id', $postId)->paginate($perPage);
    }
}
