<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
        AreaSeeder::class,
        DisciplinaSeeder::class,
        QuestaoSeeder::class,
    ]);
        
     User::create([
            'name' => 'Usuário Comum',
            'email' => 'usuario@email.com',
            'password' => Hash::make('123456'),
            'nivel' => 1
        ]);

        User::create([
            'name' => 'Professor',
            'email' => 'professor@email.com',
            'password' => Hash::make('123456'),
            'nivel' => 2
        ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => Hash::make('123456'),
            'nivel' => 3
        ]);

    }
}
