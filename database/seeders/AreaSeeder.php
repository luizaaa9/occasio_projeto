<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            ['nome' => 'Ciências Humanas'],
            ['nome' => 'Ciências da Natureza'],
            ['nome' => 'Linguagens'],
            ['nome' => 'Matemática'],
            ['nome' => 'Redação'],
        ];

        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
