<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        Product::factory(200)->create();

        Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics'
        ]);
        Category::create([
            'name' => 'Food',
            'slug' => 'food'
        ]);
        Category::create([
            'name' => 'Clothes',
            'slug' => 'clothes'
        ]);
    }
}
