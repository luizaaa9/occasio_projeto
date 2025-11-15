@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Escolher Simulado</h2>

    @auth
@if(auth()->user()->nivel == 2)

    <div>

        <h2 >Gerenciamento </h2>

        <a href="{{ route('questoes.index') }}" >+ Banco de Questões</a>

        <a href="{{ route('redacao_temas.index') }}" >+ Temas de Redação</a>

    </div>

@endif
@endauth

    <a href="{{ url('/simulado/regras/dia1') }}" class="btn btn-primary">Simulado Dia 1</a>
    <a href="{{ url('/simulado/regras/dia2') }}" class="btn btn-success">Simulado Dia 2</a>
</div>
@endsection
