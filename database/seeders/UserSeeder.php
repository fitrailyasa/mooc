<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'status' => 'aktif',
                'expertise' => NULL,
                'no_hp' => '081234567890',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Academia 1',
                'email' => 'academia@mooc.com',
                'role' => 'user',
                'status' => 'aktif',
                'expertise' => 'Academia',
                'no_hp' => '081234567890',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Research 1',
                'email' => 'research@mooc.com',
                'role' => 'user',
                'status' => 'aktif',
                'expertise' => 'Research',
                'no_hp' => '081234567890',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Software Development 1',
                'email' => 'softwaredev@mooc.com',
                'role' => 'user',
                'status' => 'aktif',
                'expertise' => 'Software Development',
                'no_hp' => '081234567890',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Administration 1',
                'email' => 'administration@mooc.com',
                'role' => 'user',
                'status' => 'aktif',
                'expertise' => 'Administration',
                'no_hp' => '081234567890',
                'password' => Hash::make('password')
            ],
        ];
        User::query()->insert($users);
    }
}
