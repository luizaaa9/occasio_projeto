<?php

namespace App\Http\Controllers;

use App\Models\Anotacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnotacaoController extends Controller
{
    public function index()
    {
        $anotacoes = Anotacao::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('anotacoes.index', compact('anotacoes'));
    }

    public function create()
    {
        return view('anotacoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        Anotacao::create([
            'user_id' => Auth::id(),
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->route('anotacoes.index')->with('success', 'Anotação criada com sucesso!');
    }

    public function show(Anotacao $anotacao)
{
    $this->authorizeUser($anotacao);
    return view('anotacoes.show', compact('anotacao'));
}

public function destroy(Anotacao $anotacao)
{
    $this->authorizeUser($anotacao);
    $anotacao->delete();

    return redirect()->route('anotacoes.index')->with('success', 'Anotação removida!');
}

private function authorizeUser(Anotacao $anotacao)
{
    if ($anotacao->user_id !== Auth::id()) {
        abort(403, 'Acesso negado.');
    }
}

}
