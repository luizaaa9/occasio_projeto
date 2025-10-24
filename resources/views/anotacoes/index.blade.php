@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Minhas Anotações</h2>

    <a href="{{ route('anotacoes.create') }}" class="btn btn-primary mb-4">
        ➕ Nova Anotação
    </a>

    <div class="row">
        @forelse($anotacoes as $anotacao)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100" style="border-radius: 16px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $anotacao->titulo }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit(strip_tags($anotacao->conteudo), 120, '...') }}
                        </p>
                        <a href="{{ route('anotacoes.show', $anotacao->id) }}" class="btn btn-outline-primary btn-sm">Abrir</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Você ainda não criou nenhuma anotação.</p>
        @endforelse
    </div>
</div>
@endsection
