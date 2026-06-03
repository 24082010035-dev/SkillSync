<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin SkillSync',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Mentor SkillSync',
            'email' => 'mentor@gmail.com',
            'password' => Hash::make('mentor123'),
            'role' => 'mentor',
        ]);

        User::create([
            'nama' => 'Mahasiswa SkillSync',
            'email' => 'mahasiswa@gmail.com',
            'password' => Hash::make('mahasiswa123'),
            'role' => 'mahasiswa',
        ]);
    }
}