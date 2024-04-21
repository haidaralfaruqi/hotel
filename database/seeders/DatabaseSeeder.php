<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin account
        User::create([
            'name' => 'Admin',
            'email' => 'admin@google.com',
            'password' => Hash::make('admin123'), // Ganti dengan password yang aman
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@google.com',
            'password' => Hash::make('user123'), // Ganti dengan password yang aman
            'role' => 'user',
        ]);
    }
}
