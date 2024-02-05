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
    
    public static function getRankingByRegion($region, $limit = 10)
    {
        return self::where('region', $region)
            ->orderByDesc('likes')
            ->limit($limit)
            ->get();
    }
    
    public static function getRankingBySeason($season, $limit = 10)
    {
        return self::where('season', $season)
            ->orderByDesc('likes')
            ->limit($limit)
            ->get();
    }
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}