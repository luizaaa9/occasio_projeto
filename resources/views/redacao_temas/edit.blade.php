@extends('layouts.app')

@section('title', 'Editar Tema')

@section('content')
<h1>Editar Tema</h1>

<form action="{{ route('redacao_temas.update', $tema->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Título:</label>
    <input type="text" name="titulo" value="{{ $tema->titulo }}" style="width:100%"><br><br>

    <label>Texto Motivador:</label><br>
    <textarea name="texto_motivador" rows="10" style="width:100%">{{ $tema->texto_motivador }}</textarea><br><br>

    <button type="submit">Salvar</button>
</form>
@endsection
