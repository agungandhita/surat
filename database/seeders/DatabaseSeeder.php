<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Admin PLN',
            'email' => 'admin@pln.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
