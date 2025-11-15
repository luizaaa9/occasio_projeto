<?php


namespace App\Http\Controllers;

use App\Models\RedacaoMotivador;
use App\Models\RedacaoTema;
use Illuminate\Http\Request;

class RedacaoMotivadorController extends Controller
{
    public function index($tema_id)
    {
        $tema = RedacaoTema::findOrFail($tema_id);
        $motivadores = $tema->motivadores;
        return view('motivadores.index', compact('tema', 'motivadores'));
    }

    public function create($tema_id)
    {
        $tema = RedacaoTema::findOrFail($tema_id);
        return view('motivadores.create', compact('tema'));
    }

    public function store(Request $request, $tema_id)
    {
        $request->validate([
            'texto' => 'required|string',
            'imagem' => 'nullable|image|max:4096'
        ]);

        $motivador = new RedacaoMotivador();
        $motivador->redacao_tema_id = $tema_id;
        $motivador->texto = $request->texto;

        if ($request->hasFile('imagem')) {
            $motivador->imagem = $request->file('imagem')->store('motivadores', 'public');
        }

        $motivador->save();

        return redirect()->route('motivadores.index', $tema_id)
            ->with('ok', 'Texto motivador criado com sucesso!');
    }

    public function edit($id)
    {
        $motivador = RedacaoMotivador::findOrFail($id);
        return view('motivadores.edit', compact('motivador'));
    }

    public function update(Request $request, $id)
    {
        $motivador = RedacaoMotivador::findOrFail($id);

        $request->validate([
            'texto' => 'required|string',
            'imagem' => 'nullable|image|max:4096'
        ]);

        $motivador->texto = $request->texto;

        if ($request->hasFile('imagem')) {
            $motivador->imagem = $request->file('imagem')->store('motivadores', 'public');
        }

        $motivador->save();

        return back()->with('ok', 'Texto motivador atualizado!');
    }

    public function destroy($id)
    {
        $motivador = RedacaoMotivador::findOrFail($id);
        $tema_id = $motivador->redacao_tema_id;

        $motivador->delete();

        return redirect()->route('motivadores.index', $tema_id)
            ->with('ok', 'Motivador apagado!');
    }
}
