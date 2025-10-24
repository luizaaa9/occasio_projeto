<?php

namespace App\Http\Controllers;

use App\Models\Conteudo;
use App\Models\Exercicio;
use Illuminate\Http\Request;

class ExercicioController extends Controller
{
    
    public function index(Conteudo $conteudo)
    {
        $exercicios = $conteudo->exercicios()->orderBy('created_at')->get();
        
        return view('exercicios.index', compact('conteudo', 'exercicios'));
    }

    public function create(Conteudo $conteudo)
    {
        return view('exercicios.create', compact('conteudo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'enunciado' => 'required|string',
            'nivel_dificuldade' => 'required|in:Fácil,Médio,Difícil',
            'opcao_a' => 'required|string',
            'opcao_b' => 'required|string',
            'opcao_c' => 'required|string',
            'opcao_d' => 'required|string',
            'opcao_e' => 'required|string',
            'resposta' => 'required|in:A,B,C,D,E',
            'conteudo_id' => 'required|exists:conteudos,id',
        ]);

        Exercicio::create([
            'enunciado' => $request->enunciado,
            'nivel_dificuldade' => $request->nivel_dificuldade,
            'opcao_a' => $request->opcao_a,
            'opcao_b' => $request->opcao_b,
            'opcao_c' => $request->opcao_c,
            'opcao_d' => $request->opcao_d,
            'opcao_e' => $request->opcao_e,
            'resposta' => $request->resposta,
            'conteudo_id' => $request->conteudo_id,
        ]);

        return redirect()->route('conteudos.exercicios', $request->conteudo_id)
            ->with('success', 'Exercício criado com sucesso!');
    }

    public function show(Exercicio $exercicio)
    {
        return view('exercicios.show', compact('exercicio'));
    }

    
    public function edit(Exercicio $exercicio)
    {
        return view('exercicios.edit', compact('exercicio'));
    }

    public function update(Request $request, Exercicio $exercicio)
    {
        $request->validate([
            'enunciado' => 'required|string',
            'nivel_dificuldade' => 'required|in:Fácil,Médio,Difícil',
            'opcao_a' => 'required|string',
            'opcao_b' => 'required|string',
            'opcao_c' => 'required|string',
            'opcao_d' => 'required|string',
            'opcao_e' => 'required|string',
            'resposta' => 'required|in:A,B,C,D,E',
        ]);

        $exercicio->update([
            'enunciado' => $request->enunciado,
            'nivel_dificuldade' => $request->nivel_dificuldade,
            'opcao_a' => $request->opcao_a,
            'opcao_b' => $request->opcao_b,
            'opcao_c' => $request->opcao_c,
            'opcao_d' => $request->opcao_d,
            'opcao_e' => $request->opcao_e,
            'resposta' => $request->resposta,
        ]);

        return redirect()->route('conteudos.exercicios', $exercicio->conteudo_id)
            ->with('success', 'Exercício atualizado com sucesso!');
    }

    public function destroy(Exercicio $exercicio)
    {
        $conteudo_id = $exercicio->conteudo_id;
        $exercicio->delete();

        return redirect()->route('conteudos.exercicios', $conteudo_id)
            ->with('success', 'Exercício excluído com sucesso!');
    }

    public function resolver(Request $request)
    {
        $request->validate([
            'exercicio_id' => 'required|exists:exercicios,id',
            'resposta' => 'required|in:A,B,C,D,E',
        ]);

        $exercicio = Exercicio::findOrFail($request->exercicio_id);
        $correto = $exercicio->resposta === $request->resposta;

        return response()->json([
            'correto' => $correto,
            'resposta_correta' => $exercicio->resposta,
            'explicacao' => 'Resposta correta: ' . $exercicio->resposta,
        ]);
    }
}