@extends('layouts.app')

@section('title', 'Adicionar Vídeo')

@section('content')
<h1>Adicionar Vídeo a {{ $conteudo->nome }}</h1>

<form action="{{ route('videos.store') }}" method="POST">
    @csrf
    <input type="hidden" name="conteudo_id" value="{{ $conteudo->id }}">

    <label>Título:</label><br>
    <input type="text" name="titulo" required><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao"></textarea><br><br>

    <label>Link do vídeo (ou upload opcional):</label><br>
    <input type="text" name="link"><br><br>

    <button type="submit">Salvar</button>
</form>
@endsection
