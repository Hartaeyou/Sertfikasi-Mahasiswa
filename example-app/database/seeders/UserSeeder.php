<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin123.com', // Ganti dengan email yang diinginkan
            'role' => 'admin',
            'password' => Hash::make('password'), // Ganti dengan password yang diinginkan
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
