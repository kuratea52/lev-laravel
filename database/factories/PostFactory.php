<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'region' => $this->faker->randomElement(['北海道', '東北', '関東', '中部', '近畿', '中国', '四国', '九州', '沖縄']),
            'season' => $this->faker->randomElement(['春', '夏', '秋', '冬']),
            'participants' => $this->faker->randomElement(['１人', '２人', '３～５人', '６人～']),
            'budget' => $this->faker->randomElement(['～１万円', '～３万円', '～５万円', '～１０万円', '１０万円～']),
            'stay_duration' => $this->faker->randomElement(['日帰り', '１泊', '２泊', '３泊', '４泊～']),
            'title' => $this->faker->sentence(5),
            'content' => $this->faker->text(100),
            'is_public' => $this->faker->boolean(true),
            'likes' => $this->faker->numberBetween(0, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}