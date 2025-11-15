@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Anotação</h2>

    <form method="POST" action="{{ route('anotacoes.update', $anotacao) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" value="{{ $anotacao->titulo }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="conteudo">Conteúdo</label>
            <textarea name="conteudo" class="form-control" rows="6">{{ $anotacao->conteudo }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
</div>
@endsection
