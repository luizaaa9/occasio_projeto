@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Regras do Simulado </h2>

    @if($tipo === 'dia1')
        <p><b>Tempo:</b> 5 horas e 30 minutos</p>
        <p><b>Áreas:</b> Linguagens e suas Tecnologias, Ciências Humanas e Redação</p>
    @else
        <p><b>Tempo:</b> 5 horas</p>
        <p><b>Áreas:</b> Matemática e suas Tecnologias e Ciências da Natureza</p>
    @endif

    <a href="{{ url('/simulado/iniciar/'.$tipo) }}" class="btn btn-primary" style="border: solid 1px; border-color:gray; border-radios:2px; margin-top:10px; padding:2px">Iniciar</a>
</div>
@endsection
