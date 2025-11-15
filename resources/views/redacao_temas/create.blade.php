@extends('layouts.app')

@section('title', 'Criar Tema de Redação')

@section('content')
<h1>Novo Tema de Redação</h1>

<form action="{{ route('redacao_temas.store') }}" method="POST">
    @csrf

    <label>Título:</label>
    <input type="text" name="titulo" style="width:100%"><br><br>

    <label>Texto Motivador:</label><br>
    <textarea name="texto_motivador" rows="10" style="width:100%"></textarea><br><br>

    <button type="submit">Salvar</button>
</form>
@endsection
