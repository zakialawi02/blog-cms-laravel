<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\users;
use Illuminate\Database\Seeder;
use Database\Seeders\FakerUsers;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(users::class);
        $this->call(FakerUsers::class); // FAKER Buat beberapa data dummy untuk tabel users
    }
}
