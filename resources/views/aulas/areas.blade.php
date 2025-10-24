@extends('layouts.app')

@section('title', 'Áreas')

@section('content')
<h1>Áreas de estudo</h1>
<ul>
    @foreach($areas as $area)
        <li>
            <a href="{{ route('aulas.disciplinas', $area->id) }}">
                {{ $area->nome }}
            </a>
        </li>
    @endforeach
</ul>
@endsection
