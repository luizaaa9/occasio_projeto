<?php

namespace App\Http\Controllers;

use App\Models\Questao;
use App\Models\Disciplina;
use App\Models\Conteudo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestaoController extends Controller
{
    public function index()
    {
        $questoes = Questao::with('disciplina')->orderBy('id', 'desc')->paginate(20);
        return view('questoes.index', compact('questoes'));
    }

    public function create()
    {
        $disciplinas = Disciplina::all();
        $conteudos = Conteudo::all();
        return view('questoes.create', compact('disciplinas', 'conteudos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'disciplina_id'=>'required',
            'enunciado'=>'required',
            'alternativa_a'=>'required',
            'alternativa_b'=>'required',
            'alternativa_c'=>'required',
            'alternativa_d'=>'required',
            'alternativa_e'=>'required',
            'correta'=>'required|in:a,b,c,d,e'
        ]);

        Questao::create([
            ...$request->all(),
            'user_id'=>Auth::id(),
        ]);

        return redirect()->route('questoes.index')->with('sucesso', 'Questão criada!');
    }

    public function edit(Questao $questao)
    {
        $disciplinas = Disciplina::all();
        $conteudos = Conteudo::all();
        return view('questoes.edit', compact('questao','disciplinas','conteudos'));
    }

    public function update(Request $request, Questao $questao)
    {
        $request->validate([
            'disciplina_id'=>'required',
            'enunciado'=>'required',
            'correta'=>'required|in:a,b,c,d,e'
        ]);

        $questao->update($request->all());

        return redirect()->route('questoes.index')->with('sucesso', 'Questão atualizada!');
    }

    public function destroy(Questao $questao)
    {
        $questao->delete();
        return redirect()->route('questoes.index')->with('sucesso', 'Questão apagada!');
    }
}
