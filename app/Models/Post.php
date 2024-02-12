<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'transportation',
        'title',
        'content',
        'is_public'
    ];
    
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