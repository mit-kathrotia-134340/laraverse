<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */
class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
           'tweet' => fake()->sentence(),
           'user_id'=> User::factory(),
           'tweet_images' => 'tweet_images/' . fake()->numberBetween(1,8) . '.jpg',
        ];
    }
}
