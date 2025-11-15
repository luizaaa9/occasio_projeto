@extends('layouts.app')

@section('content')
<div class="anotacoes-container">

    <h1 style="margin-bottom: 20px;">Minhas Anotações</h1>

    <a href="{{ route('anotacoes.create') }}"
       style="padding:10px 15px;background:#c084fc;color:white;border-radius:8px;text-decoration:none;">
        ➕ Nova anotação
    </a>

    <hr style="margin: 20px 0;">

    @forelse($anotacoes as $anotacao)
        <a href="{{ route('anotacoes.show', $anotacao->id) }}" style="text-decoration:none; color:inherit;">
            <div class="anotacao-item">
                <h3>{{ $anotacao->titulo }}</h3>
                <small>{{ $anotacao->created_at->format('d/m/Y H:i') }}</small>
            </div>
        </a>
    @empty
        <p>Você ainda não criou nenhuma anotação.</p>
    @endforelse

</div>
@endsection
