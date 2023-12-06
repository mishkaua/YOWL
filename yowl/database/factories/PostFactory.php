<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'link' => fake()->url(),
            'categories_id' => fake()->randomDigitNot(0),
            'content' => fake()->sentence(5),
            'user_id' => fake()->randomDigitNot(0),
        ];
    }
}
