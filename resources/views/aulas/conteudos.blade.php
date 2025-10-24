@extends('layouts.app')

@section('title', 'Conteúdos')

@section('content')
<h1>Conteúdos de {{ $disciplina->nome }}</h1>

@if(auth()->user()->nivel >= 2)
    <a href="{{ route('conteudos.create') }}" style="margin-bottom:15px; display:inline-block;">Adicionar Conteúdo</a>
@endif

<ul>
    @foreach($conteudos as $conteudo)
        <li>
            <a href="{{ route('conteudos.show', $conteudo->id) }}">
                {{ $conteudo->nome }}
            </a>
        </li>
    @endforeach
</ul>
@endsection
