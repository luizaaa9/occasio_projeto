@extends('layouts.app')

@section('title', 'Simulado')

@section('content')

<h1>Simulado - {{ $tipo }}</h1>

<h3>Tempo restante: <span id="timer">05:00:00</span></h3>
<hr>

<form action="{{ route('simulado.responder', $simulado->id) }}" method="POST">
    @csrf

    @foreach($questoes as $q)
        <div style="margin-bottom:30px">
            <p><b>{{ $loop->iteration }}.</b> {{ $q->enunciado }}</p>

            <label><input type="radio" name="respostas[{{ $q->id }}]" value="a"> A) {{ $q->a }}</label><br>
            <label><input type="radio" name="respostas[{{ $q->id }}]" value="b"> B) {{ $q->b }}</label><br>
            <label><input type="radio" name="respostas[{{ $q->id }}]" value="c"> C) {{ $q->c }}</label><br>
            <label><input type="radio" name="respostas[{{ $q->id }}]" value="d"> D) {{ $q->d }}</label><br>
            <label><input type="radio" name="respostas[{{ $q->id }}]" value="e"> E) {{ $q->e }}</label><br>
        </div>
    @endforeach

    @if($tipo == 'dia1')
    <div class="redacao-container">
        <label for="redacao"><strong>Redação:</strong></label>
        <textarea name="redacao" id="redacao" class="redacao-textarea" rows="30"></textarea>
    </div>@endif


    <button type="submit">Enviar Respostas</button>
</form>

<script>
    let tempo = 5 * 60 * 60;

    const timerElement = document.getElementById('timer');

    function atualizarTimer() {
        let horas = Math.floor(tempo / 3600);
        let minutos = Math.floor((tempo % 3600) / 60);
        let segundos = tempo % 60;

        timerElement.textContent =
            String(horas).padStart(2, '0') + ':' +
            String(minutos).padStart(2, '0') + ':' +
            String(segundos).padStart(2, '0');

        if (tempo <= 0) {
            alert("O tempo acabou! Suas respostas serão enviadas automaticamente.");
            document.querySelector("form").submit();
        }

        tempo--;
    }

    setInterval(atualizarTimer, 1000);
</script>

@endsection

