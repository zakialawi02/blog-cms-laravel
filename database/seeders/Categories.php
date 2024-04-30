<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category' => "Technology",
                'slug' => "technology",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "Book",
                'slug' => "book",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "Diary",
                'slug' => "diary",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "Geo",
                'slug' => "geography-geodesy",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "Tutorial",
                'slug' => "tutorial",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
