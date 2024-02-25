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
        // ユーザーを作成する
        User::factory(30)->create();
        
        // 90個のPostを作成する
        User::all()->each(function ($user) {
            Post::factory()->count(3)->create(['user_id' => $user->id]);
        });
        
        // 管理者ユーザーを作成する
        User::create([
            'name' => 'kuratea52',
            'email' => 'yasaimogu@gmail.com',
            'password' => bcrypt('Sakura52'),
        ]);
    }
}