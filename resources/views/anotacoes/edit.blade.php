@extends('layouts.app')

@section('content')
<div class="anotacao-form-container">

    <h1>Editar Anotação</h1>

    <form action="{{ route('anotacoes.update', $anotacao->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Título:</label>
        <input type="text" name="titulo" value="{{ $anotacao->titulo }}" required>

        <label>Conteúdo:</label>
        <textarea name="conteudo" rows="12" required>{{ $anotacao->conteudo }}</textarea>

        <button type="submit" class="btn-save">Salvar Alterações</button>
    </form>

</div>

<style>
.anotacao-form-container {
    width: 80%;
    margin: 30px auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
}
.anotacao-form-container input,
.anotacao-form-container textarea {
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
}
.btn-save {
    background: #22c55e;
    color: white;
    padding: 10px 15px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
}
</style>
@endsection
