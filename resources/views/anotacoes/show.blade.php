@extends('layouts.app')

@section('content')
<div class="anotacao-show-container">

    <h1>{{ $anotacao->titulo }}</h1>

    <p class="data">{{ $anotacao->created_at->format('d/m/Y H:i') }}</p>

    <div class="conteudo">
        {!! nl2br(e($anotacao->conteudo)) !!}
    </div>

    <div class="botoes">
        <a href="{{ route('anotacoes.edit', $anotacao->id) }}" class="btn-edit">
            ✏️ Editar
        </a>

        <form action="{{ route('anotacoes.destroy', $anotacao->id) }}" method="POST"
              onsubmit="return confirm('Tem certeza que deseja excluir esta anotação?');">
            @csrf
            @method('DELETE')
            <button class="btn-delete">🗑 Excluir</button>
        </form>
    </div>

</div>

<style>
.anotacao-show-container {
    width: 80%;
    margin: 30px auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
}
.botoes {
    margin-top: 25px;
    display: flex;
    gap: 15px;
}
.btn-edit, .btn-delete {
    padding: 10px 15px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    border: none;
    cursor: pointer;
}
.btn-edit {
    background: #c084fc;
    color: white;
}
.btn-delete {
    background: #ef4444;
    color: white;
}
</style>
@endsection
