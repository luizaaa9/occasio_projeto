<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{

     public function porArea(Area $area)
    {
        $disciplinas = $area->disciplinas()->orderBy('nome')->get();
        
        return view('aulas.disciplinas', compact('area', 'disciplinas'));
    }


    public function getByArea($areaId)
{
    $area = Area::findOrFail($areaId);
    return response()->json($area->disciplinas);
}

}
