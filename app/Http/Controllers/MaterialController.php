<?php

namespace App\Http\Controllers;

use App\Models\Conteudo;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Lista materiais de um conteúdo específico
     */
    public function index(Conteudo $conteudo)
    {
        $materiais = $conteudo->materiais()->orderBy('titulo')->get();
        
        return view('materiais.index', compact('conteudo', 'materiais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Conteudo $conteudo)
    {
        return view('materiais.create', compact('conteudo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'arquivo' => 'required|file|mimes:pdf,doc,docx,txt|max:10240',
            'descricao' => 'nullable|string',
            'conteudo_id' => 'required|exists:conteudos,id',
        ]);

        // Upload do arquivo
        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo');
            $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();
            $caminho = $arquivo->storeAs('materiais', $nomeArquivo, 'public');
        }

        Material::create([
            'titulo' => $request->titulo,
            'arquivo' => $caminho ?? null,
            'descricao' => $request->descricao,
            'conteudo_id' => $request->conteudo_id,
        ]);

        return redirect()->route('conteudos.materiais', $request->conteudo_id)
            ->with('success', 'Material criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return view('materiais.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('materiais.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $material->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('conteudos.materiais', $material->conteudo_id)
            ->with('success', 'Material atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $conteudo_id = $material->conteudo_id;
        $material->delete();

        return redirect()->route('conteudos.materiais', $conteudo_id)
            ->with('success', 'Material excluído com sucesso!');
    }
}