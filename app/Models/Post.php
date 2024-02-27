<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'region',
        'season',
        'participants',
        'budget',
        'stay_duration',
        'title',
        'content',
        'is_public',
        'user_id',
        'image_path_1',
        'image_path_2',
        'image_path_3',
    ];
    
    // place_visited_$i と impressions_$i を追加
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        
        for ($i = 1; $i <= 20; $i++) {
            $this->fillable[] = "place_visited_$i";
            $this->fillable[] = "impressions_$i";
        }
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function likers()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }
    
    // ユーザーが同じ投稿に複数回「いいね」できないようにする
    public function hasBeenLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }
    
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    
    public static function getTotalLikesRanking($limit = 3)
    {
        return self::where('is_public', true) // 公開可否が「公開」の投稿のみを対象にする
            ->orderByDesc('likes')
            ->limit($limit)
            ->get();
    }
    
    public static function getRankingByRegion($region, $limit = 3)
    {
        return self::where('region', $region)
            ->where('is_public', true) // 公開可否が「公開」の投稿のみを対象にする
            ->orderByDesc('likes')
            ->limit($limit)
            ->get();
    }
    
    public static function getRankingBySeason($season, $limit = 3)
    {
        return self::where('season', $season)
            ->where('is_public', true) // 公開可否が「公開」の投稿のみを対象にする
            ->orderByDesc('likes')
            ->limit($limit)
            ->get();
    }
    
    public static function getLikesRankingByParticipants($participants, $limit = 3)
    {
        return self::where('participants', $participants)
            ->where('is_public', true) // 公開可否が「公開」の投稿のみを対象にする
            ->orderByDesc('likes')
            ->limit($limit)
            ->get();
    }
    
    public static function getLikesRankingByBudget($budget, $limit = 3)
    {
        return self::where('budget', $budget)
            ->where('is_public', true) // 公開可否が「公開」の投稿のみを対象にする
            ->orderByDesc('likes')
            ->limit($limit)
            ->get();
    }
    
    public static function getLikesRankingByStayDuration($stayDuration, $limit = 3)
    {
        return self::where('stay_duration', $stayDuration)
            ->where('is_public', true) // 公開可否が「公開」の投稿のみを対象にする
            ->orderByDesc('likes')
            ->limit($limit)
            ->get();
    }
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->where('is_public', true) // 公開可否が「公開」の投稿のみを対象にする
            ->orderBy('updated_at', 'DESC')
            ->paginate($limit_count);
    }
}