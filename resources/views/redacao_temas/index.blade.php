@extends('layouts.app')

@section('title', 'Temas de Redação')

@section('content')
<h1>Temas de Redação</h1>

<a href="{{ route('redacao_temas.create') }}">+ Criar Tema</a>

<table border="1" cellpadding="10" style="width:100%; margin-top:20px;">
    <tr>
        <th>ID</th>
        <th>Tema</th>
        <th>Ações</th>
    </tr>

    @foreach($temas as $t)
    <tr>
        <td>{{ $t->id }}</td>
        <td>{{ $t->titulo }}</td>
        <td>
            <a href="{{ route('redacao_temas.edit', $t->id) }}">Editar</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
