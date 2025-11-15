<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Questao;

class QuestaoSeeder extends Seeder
{
    public function run(): void
    {
        Questao::factory(100)->create();
    }
}
