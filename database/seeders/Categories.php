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
                'category' => "Category 1",
                'slug' => "category-1",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "Category 2",
                'slug' => "category-2",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "Category 3",
                'slug' => "category-3",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
