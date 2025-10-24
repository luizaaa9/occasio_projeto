@extends('layouts.app')

@section('title', 'Materiais')

@section('content')
<h1>Materiais de {{ $conteudo->nome }}</h1>

@if(auth()->user()->nivel >= 2)
    <a href="{{ route('materiais.create', $conteudo->id) }}">Adicionar Material</a>
@endif

<ul>
    @foreach($materiais as $material)
        <li>
            {{ $material->titulo }} - 
            @if($material->link)
                <a href="{{ $material->link }}">Abrir link</a>
            @endif
            @if($material->documento)
                <a href="{{ asset('storage/' . $material->documento) }}">Download</a>
            @endif
        </li>
    @endforeach
</ul>
@endsection
