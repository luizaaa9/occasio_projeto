<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Disciplina;
use App\Models\Conteudo;

class ConteudoController extends Controller
{
    // Listar todos os conteúdos
    public function index()
    {
        $conteudos = Conteudo::with('disciplina.area')->get();
        return view('conteudos.index', compact('conteudos'));
    }

    // Formulário de criação
   // ConteudoController.php
public function create()
{
    $disciplinas = Disciplina::with('area')->orderBy('nome')->get();
    $areas = Area::orderBy('nome')->get(); // Se precisar de áreas também
    
    return view('conteudos.create', compact('disciplinas', 'areas'));
}
    // Salvar no banco
    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'disciplina_id' => 'required|exists:disciplinas,id',
        'descricao' => 'required|string',
    ]);

    Conteudo::create([
        'nome' => $request->nome,
        'disciplina_id' => $request->disciplina_id,
    ]);

    // Redireciona para a página de conteúdos da disciplina
    $disciplina = Disciplina::find($request->disciplina_id);
    return redirect()->route('aulas.conteudos', [
        'area' => $disciplina->area_id,
        'disciplina' => $request->disciplina_id
    ])->with('success', 'Conteúdo criado com sucesso!');
}

    // AJAX — retorna disciplinas de uma área
    public function getDisciplinas($area_id)
    {
        $disciplinas = Disciplina::where('area_id', $area_id)->get();
        return response()->json($disciplinas);
    }
    
public function porDisciplina($areaId, $disciplinaId)
    {
        $disciplina = Disciplina::findOrFail($disciplinaId);
        $conteudos = $disciplina->conteudos; 
        return view('aulas.conteudos', compact('disciplina', 'conteudos'));
    }

    
 public function show($id)
{
    $conteudo = Conteudo::with(['videos', 'materiais', 'exercicios'])->findOrFail($id);
    return view('conteudos.show', compact('conteudo'));
}

}
