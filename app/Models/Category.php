<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function posts()   // postを複数形にすることで、関連する複数のデータを取得するという意味。
    {
        return $this->hasMany(Post::class);   // categoriesテーブル→postsテーブル：１対多の関係、hasManyメソッドを使う。
    }
}
