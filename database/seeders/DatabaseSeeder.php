<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call(PostSeeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(20)->create();
        
        User::create([
            'name' => 'kuratea52',
            'email' => 'yasaimogu@gmail.com',
            'password' => bcrypt('Sakura52'),
        ]);
    }
}