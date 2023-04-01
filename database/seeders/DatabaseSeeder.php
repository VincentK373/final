<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Article::factory(25)->create();
        User::create([
            'name' => 'Vincent',
            'username' => 'v234',
            'email' => 'vincent@gmail.com',
            'password' => bcrypt('password')
        ]);


        Genre::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);
        Genre::create([
            'name' => 'Web',
            'slug' => 'web'
        ]);
        Genre::create([
            'name' => 'Business',
            'slug' => 'business'
        ]);
    }
}
