<?php

namespace App\Http\Controllers;

use App\Models\RedacaoResposta;
use Illuminate\Http\Request;

class RedacaoRespostaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tema_id' => 'required|exists:redacao_temas,id',
            'user_id' => 'required|exists:users,id',
            'texto' => 'required|string|max:5000'
        ]);

        return RedacaoResposta::create($request->all());
    }

    public function show(RedacaoResposta $resposta)
    {
        return $resposta->load(['tema', 'aluno']);
    }
}
