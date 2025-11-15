<?php

namespace App\Http\Controllers;

use App\Models\Anotacao;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AnotacaoController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $anotacoes = Anotacao::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
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
            'titulo' => 'required',
            'conteudo' => 'required',
        ]);

        Anotacao::create([
            'user_id' => auth()->id(),
            'titulo'   => $request->titulo,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->route('anotacoes.index')
            ->with('success', 'Criada com sucesso!');
    }

    public function show(Anotacao $anotacao)
    {
        if ($anotacao->user_id !== auth()->id()) abort(403);

        return view('anotacoes.show', compact('anotacao'));
    }

    public function edit(Anotacao $anotacao)
    {
        
        return view('anotacoes.edit', compact('anotacao'));
    }

     public function update(Request $request, Anotacao $anotacao)
    {
        $anotacao->update($request->only('titulo', 'conteudo'));

        return redirect()->route('anotacoes.show', $anotacao->id);
    }

    public function destroy(Anotacao $anotacao)
    {

        $anotacao->delete();

        return redirect()->route('home');
    }
}
