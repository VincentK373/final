<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(mt_rand(3, 8)),
            'slug' => fake()->slug(),
            'synopsis' => fake()->sentence(mt_rand(10, 30)),
            'body' => collect(fake()->paragraphs(mt_rand(4, 10)))->map(function ($p) {
                return "<p>$p</p>";
            })->implode(''),
            'category_id' => mt_rand(1, 2),
            'user_id' => mt_rand(1, 8),
        ];
    }
}
