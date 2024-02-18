<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Like;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(30)->create();
        \App\Models\Post::factory(100)->create();
        
        // 管理者ユーザーを作成する
        User::create([
            'name' => 'kuratea52',
            'email' => 'yasaimogu@gmail.com',
            'password' => bcrypt('Sakura52'),
        ]);
    }
}