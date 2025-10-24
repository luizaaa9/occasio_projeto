@extends('layouts.app')

@section('title', 'Adicionar Material')

@section('content')
<h1>Adicionar Material a {{ $conteudo->nome }}</h1>

<form action="{{ route('materiais.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="conteudo_id" value="{{ $conteudo->id }}">

    <label>Título:</label><br>
    <input type="text" name="titulo" required><br><br>

    <label>Documento (opcional):</label><br>
    <input type="file" name="documento"><br><br>

    <label>Link (opcional):</label><br>
    <input type="text" name="link"><br><br>

    <button type="submit">Salvar</button>
</form>
@endsection
