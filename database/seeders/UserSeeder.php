<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'nivel' => 3, // 3 = adm
        ]);

        User::create([
            'name' => 'Professor',
            'email' => 'professor@email.com',
            'password' => Hash::make('12345678'),
            'nivel' => 2, // 2 = professor
        ]);

        User::create([
            'name' => 'Aluno',
            'email' => 'aluno@email.com',
            'password' => Hash::make('12345678'),
            'nivel' => 1, // 1 = usuario
        ]);
    }
}
