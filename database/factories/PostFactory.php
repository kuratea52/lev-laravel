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
        $regions = ['tokyo', 'kyoto'];
        
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'region' => $this->faker->randomElement($regions),
            'season' => $this->faker->word,
            'participants' => $this->faker->numberBetween(1, 10),
            'budget' => $this->faker->randomElement(['～１万円', '～３万円', '～５万円', '～１０万円', '１０万円～']),
            'stay_duration' => $this->faker->numberBetween(1, 14),
            'transportation' => $this->faker->word,
            'title' => $this->faker->sentence(5),
            'content' => $this->faker->text(100),
            'is_public' => $this->faker->boolean(true),
            'likes' => $this->faker->numberBetween(0, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}