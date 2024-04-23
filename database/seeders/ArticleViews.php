<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleView;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleViews extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $articles = Article::all()->pluck('id')->toArray();
        $numberOfViews = 100;
        for ($i = 0; $i < $numberOfViews; $i++) {
            ArticleView::create([
                'article_id' =>  $faker->randomElement($articles),
                'viewed_at' => $faker->dateTimeBetween('-1 month', 'now'),
                'ip_address' => $faker->ipv4,
                'location' => $faker->country,
            ]);
        }
    }
}
