<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
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
        Article::factory(200)->create();
        User::create([
            'name' => 'Vincent',
            'username' => 'v234',
            'email' => 'vincent@gmail.com',
            'password' => bcrypt('password')
        ]);


        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);
        Category::create([
            'name' => 'Web',
            'slug' => 'web'
        ]);
        Category::create([
            'name' => 'Business',
            'slug' => 'business'
        ]);
    }
}
