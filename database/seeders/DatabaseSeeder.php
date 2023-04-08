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

        Category::create([
            'name' => 'Ekonomi',
            'slug' => 'ekonomi'
        ]);
        Category::create([
            'name' => 'Sejarah',
            'slug' => 'sejarah'
        ]);
        Category::create([
            'name' => 'Matematika',
            'slug' => 'matematika'
        ]);
    }
}
