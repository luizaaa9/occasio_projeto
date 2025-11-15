<?php

namespace App\Http\Controllers;

use App\Models\RedacaoTema;
use Illuminate\Http\Request;

class RedacaoTemaController extends Controller
{
    public function index()
    {
        $temas = RedacaoTema::all();
        return view('temas.index', compact('temas'));
    }

    public function create()
    {
        return view('temas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tema' => 'required|string',
        ]);

        RedacaoTema::create([
            'tema' => $request->tema
        ]);

        return redirect()->route('temas.index')
            ->with('ok', 'Tema de redação criado com sucesso!');
    }

    public function edit($id)
    {
        $tema = RedacaoTema::findOrFail($id);
        return view('temas.edit', compact('tema'));
    }

    public function update(Request $request, $id)
    {
        $tema = RedacaoTema::findOrFail($id);

        $request->validate([
            'tema' => 'required|string'
        ]);

        $tema->update([
            'tema' => $request->tema
        ]);

        return back()->with('ok', 'Tema atualizado!');
    }

    public function destroy($id)
    {
        $tema = RedacaoTema::findOrFail($id);
        $tema->delete();

        return redirect()->route('temas.index')
            ->with('ok', 'Tema apagado!');
    }
}
