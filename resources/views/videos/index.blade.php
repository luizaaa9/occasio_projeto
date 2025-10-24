@extends('layouts.app')

@section('title', 'Vídeos')

@section('content')
<h1>Vídeos de {{ $conteudo->nome }}</h1>

@if(auth()->user()->nivel >= 2)
    <a href="{{ route('videos.create', $conteudo->id) }}">Adicionar Vídeo</a>
@endif

<ul>
    @foreach($videos as $video)
        <li>{{ $video->titulo }} - <a href="{{ $video->link }}">Assistir</a></li>
    @endforeach
</ul>
@endsection
