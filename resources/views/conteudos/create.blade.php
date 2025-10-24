@extends('layouts.app')

@section('title', 'Adicionar Conteúdo')

@section('content')
<h1>Adicionar Conteúdo</h1>

<form action="{{ route('conteudos.store') }}" method="POST">
    @csrf
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Área:</label><br>
    <select name="area_id" required>
        @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->nome }}</option>
        @endforeach
    </select><br><br>

    <label>Disciplina:</label><br>
    <select name="disciplina_id" required>
        @foreach($disciplinas as $disciplina)
            <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
        @endforeach
    </select><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao" required></textarea><br><br>

    <button type="submit">Salvar</button>
</form>
@endsection
