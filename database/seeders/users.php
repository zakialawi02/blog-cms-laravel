<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'photo_profile' => 'admin.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Writer User',
            'username' => 'writer',
            'email' => 'writer@mail.com',
            'password' => Hash::make('writer'),
            'role' => 'writer',
            'photo_profile' => 'writer.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Regular User',
            'username' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('user'),
            'role' => 'user',
            'photo_profile' => 'user.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
