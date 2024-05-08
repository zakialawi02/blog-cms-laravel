<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Articles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = User::all()->pluck('id')->toArray();
        $categories = Category::all()->pluck('id')->toArray();

        foreach (range(1, 200) as $index) {
            Article::create([
                'category_id' => $faker->randomElement($categories),
                'user_id' => $faker->randomElement($users),
                'title' => $faker->sentence,
                'content' => $faker->paragraphs(15, true),
                'slug' => $faker->slug,
                'excerpt' => $faker->paragraph(4),
                'status' => $faker->randomElement(['published', 'draft']),
                'published_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
