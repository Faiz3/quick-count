<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'isAdmin' => true,
            'password' => Hash::make('user123'),
            'on_password' => 'user123',
        ]);
        DB::table('users')->insert([
            'name' => 'faiz',
            'email' => 'faiz@gmail.com',
            'isAdmin' => false,
            'password' => Hash::make('faiz123'),
            'on_password' => 'faiz123',
        ]);
    }
}
