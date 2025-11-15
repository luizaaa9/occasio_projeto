@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('anotacoes.index') }}" class="btn btn-link mb-3">⬅ Voltar</a>

    <div class="card shadow p-4" style="border-radius: 16px;">
        <h3>{{ $anotacao->titulo }}</h3>
        <hr>
        <div class="mt-3" style="white-space: pre-line;">
            {!! nl2br(e($anotacao->conteudo)) !!}
        </div>
    </div>
</div>
@endsection
