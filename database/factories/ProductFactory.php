<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = fake()->name(),
            'slug' => Str::slug($name),
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 1000000),
            'quantity' => mt_rand(0, 600),
            'category_id' => mt_rand(1, 3),
            'des' => fake()->sentence(mt_rand(5, 15)),
        ];
    }
}
