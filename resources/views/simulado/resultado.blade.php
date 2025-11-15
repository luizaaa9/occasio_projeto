@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Resultado do Simulado</h2>

    <p><strong>Acertos:</strong> {{ $acertos }} / {{ $total }}</p>
    <p><strong>Média:</strong> {{ $media }}</p>

    <hr>

    <h3>Resolução da Prova</h3>

    @foreach ($resolucao as $item)
        <div style="margin-bottom: 25px;">
            <p><strong>Questão:</strong> {!! $item['enunciado'] !!}</p>

            <p><strong>Sua resposta:</strong> {{ $item['usuario'] }}</p>
            <p><strong>Resposta correta:</strong> {{ $item['correta'] }}</p>

            @if ($item['acertou'])
                <p style="color: green; font-weight: bold;">✔ Acertou!</p>
            @else
                <p style="color: red; font-weight: bold;">✘ Errou!</p>
            @endif
        </div>
        <hr>
    @endforeach
    
    <h3>Redação</h3>
<div style="padding: 15px; border: 1px solid #ccc; border-radius: 5px;">
    {!! nl2br(e($redacao)) !!}
</div>

<hr>

</div>
@endsection
