<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@puskesmas.local'],
            [
                'name' => 'Admin Puskesmas',
                'password' => Hash::make('Admin123!'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@puskesmas.local'],
            [
                'name' => 'Warga',
                'password' => Hash::make('User123!'),
                'role' => 'user',
            ]
        );
    }
}
