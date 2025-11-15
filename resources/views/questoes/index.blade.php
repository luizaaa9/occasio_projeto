@extends('layouts.app')

@section('title', 'Banco de Questões')

@section('content')
<h1>Banco de Questões</h1>

<a href="{{ route('questoes.create') }}">+ Adicionar Questão</a>

<table border="1" cellpadding="8" style="margin-top:15px; width:100%;">
    <tr>
        <th>ID</th>
        <th>Enunciado</th>
        <th>Disciplina</th>
        <th>Ações</th>
    </tr>

    @foreach($questoes as $q)
    <tr>
        <td>{{ $q->id }}</td>
        <td>{{ Str::limit($q->enunciado, 60) }}</td>
        <td>{{ $q->disciplina->nome ?? '-' }}</td>
        <td>
            <a href="{{ route('questoes.edit', $q->id) }}">Editar</a>
            |
            <form action="{{ route('questoes.destroy', $q->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Excluir?')">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
