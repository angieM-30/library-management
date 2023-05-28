<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::where('email', 'supadmin@example.com')->first()) {
            $user = User::create([
                'name' => 'Librarian',
                'email' => 'librarian@sorsu.edu.ph',
                'role' => 'admin',
                'password' => Hash::make('admin1234'),
            ]);
        }
    }
}
