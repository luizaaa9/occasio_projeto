<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disciplina;
use App\Models\Area;

class DisciplinaSeeder extends Seeder
{
    public function run(): void
    {
        $disciplinas = [
            'Ciências Humanas' => ['História', 'Filosofia', 'Sociologia', 'Artes'],
            'Ciências da Natureza' => ['Biologia', 'Química', 'Física'],
            'Linguagens' => ['Língua Portuguesa', 'Língua Inglesa', 'Espanhol'],
            'Matemática' => ['Matemática'],
            'Redação' => ['Redação'],
        ];

        foreach ($disciplinas as $areaNome => $disciplinasArea) {
            $area = Area::where('nome', $areaNome)->first();

            foreach ($disciplinasArea as $nome) {
                Disciplina::create([
                    'nome' => $nome,
                    'area_id' => $area->id,
                ]);
            }
        }
    }
}

