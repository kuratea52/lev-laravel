<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');

        // ユーザーを作成する
        for ($i = 0; $i < 30; $i++) {
            $email = $faker->unique()->safeEmail;
            // すでに存在するメールアドレスでないことを確認する
            while (User::where('email', $email)->exists()) {
                $email = $faker->unique()->safeEmail;
            }

            User::create([
                'name' => $faker->name,
                'email' => $email,
                'password' => bcrypt('password'),
            ]);
        }

        // 90個のPostを作成する
        User::all()->each(function ($user) use ($faker) {
            for ($i = 0; $i < 3; $i++) {
                $post = $user->posts()->create([
                    'region' => $faker->randomElement(['北海道', '東北', '関東', '中部', '近畿', '中国', '四国', '九州', '沖縄']),
                    'season' => $faker->randomElement(['春', '夏', '秋', '冬']),
                    'participants' => $faker->randomElement(['１人', '２人', '３～５人', '６人～']),
                    'budget' => $faker->randomElement(['～１万円', '～３万円', '～５万円', '～１０万円', '１０万円～']),
                    'stay_duration' => $faker->randomElement(['日帰り', '１泊', '２泊', '３泊', '４泊～']),
                    'title' => $faker->realText(20),
                    'content' => $faker->realText(),
                    'is_public' => $faker->boolean(true),
                    'likes' => $faker->numberBetween(0, 100),
                    'image_path_1' => $faker->imageUrl(),
                    'image_path_2' => $faker->imageUrl(),
                    'image_path_3' => $faker->imageUrl(),
                ]);

                // 場所と感想を追加
                for ($j = 1; $j <= 20; $j++) {
                    $post->update([
                        "place_visited_$j" => $faker->realText(20),
                        "impressions_$j" => $faker->realText(),
                    ]);
                }
            }
        });

        // 管理者ユーザーを作成する
        User::create([
            'name' => 'kuratea52',
            'email' => 'aaa@gmail.com',
            'password' => bcrypt('aaa'),
        ]);
    }
}
