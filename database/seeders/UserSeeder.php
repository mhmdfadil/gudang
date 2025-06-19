<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Mengimpor model User
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('admin123'), // Password terenkripsi
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'nama' => 'User',
            'username' => 'user',
            'password' => Hash::make('user123'), // Password terenkripsi
            'remember_token' => Str::random(60),
        ]);

    }
}
