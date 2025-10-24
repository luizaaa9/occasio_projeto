@extends('layouts.app')

@section('title', $conteudo->nome)

@section('content')
<h1>{{ $conteudo->nome }}</h1>
<p>Disciplina: {{ $conteudo->disciplina->nome }}</p>

<nav>
    <a href="{{ route('conteudos.videos', $conteudo->id) }}">Vídeos</a> |
    <a href="{{ route('conteudos.materiais', $conteudo->id) }}">Materiais</a> |
    <a href="{{ route('conteudos.exercicios', $conteudo->id) }}">Exercícios</a>
</nav>

<div>
    @yield('aba_content')
</div>
@endsection
