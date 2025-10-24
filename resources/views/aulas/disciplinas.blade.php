@extends('layouts.app')

@section('title', 'Disciplinas')

@section('content')
<h1>Disciplinas de {{ $area->nome }}</h1>
<ul>
    @foreach($disciplinas as $disciplina)
        <li>
            <a href="{{ route('aulas.conteudos', [$area->id, $disciplina->id]) }}">
                {{ $disciplina->nome }}
            </a>
        </li>
    @endforeach
</ul>
@endsection
