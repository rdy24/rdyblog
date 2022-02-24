<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        Category::create([
            "name" => "Programming",
            "slug" => "programming",
        ]);
        Category::create([
            "name" => "Mobile",
            "slug" => "mobile",
        ]);
        Category::create([
            "name" => "Personal",
            "slug" => "personal",
        ]);

        Post::factory(20)->create();
    }
}
