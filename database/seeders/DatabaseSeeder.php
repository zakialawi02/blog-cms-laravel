<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ArticleView;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\FakerUsers;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MenuItems::class);
        $this->call(Users::class);
        User::factory(200)->create();
        $this->call(Categories::class);
        $this->call(Tags::class);
        $this->call(Articles::class);
        ArticleView::factory(500)->create();
    }
}
