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
        if (!User::where('sorsu_email', 'supadmin@example.com')->first()) {
            $user = User::create([
                'name' => 'Librarian',
                'sorsu_email' => 'admin@example.com',
                'role' => 'admin',
                'password' => Hash::make('admin1234'),
            ]);
        }
    }
}
