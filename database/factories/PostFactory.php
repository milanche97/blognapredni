<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition()
    {
        return [
            'title' => fake()->sentences(1,true),
            'body' => fake()->text(),
            'published' => fake()->boolean(99),
            // 'user_id' => User::inRandomOrder()->first()->id //nasumicno dovlacimo jednog usera
         ];
    }
}
