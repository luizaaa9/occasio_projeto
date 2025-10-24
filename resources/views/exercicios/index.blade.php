@extends('layouts.app')

@section('title', 'Exercícios - ' . $conteudo->nome)

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('aulas.areas') }}">Áreas</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('aulas.disciplinas', $conteudo->disciplina->area_id) }}">{{ $conteudo->disciplina->area->nome }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('aulas.conteudos', ['area' => $conteudo->disciplina->area_id, 'disciplina' => $conteudo->disciplina_id]) }}">{{ $conteudo->disciplina->nome }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('conteudos.show', $conteudo->id) }}">{{ $conteudo->nome }}</a></li>
                    <li class="breadcrumb-item active">Exercícios</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Exercícios - {{ $conteudo->nome }}</h4>
                        <p class="text-muted mb-0">Pratique seus conhecimentos</p>
                    </div>
                    
                    @if(auth()->user()->nivel >= 2)
                        <a href="{{ route('exercicios.create', $conteudo->id) }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Adicionar Exercício
                        </a>
                    @endif
                </div>
                
                <div class="card-body">
                    @if($exercicios->count() > 0)
                        <div class="row">
                            @foreach($exercicios as $exercicio)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">Exercício {{ $loop->iteration }}</h5>
                                            <p class="card-text">{{ Str::limit($exercicio->pergunta, 100) }}</p>
                                            <p class="text-muted small">
                                                {{ count($exercicio->opcoes) }} opções
                                            </p>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <div class="btn-group w-100">
                                                @if(auth()->user()->nivel >= 1)
                                                    <a href="{{ route('exercicios.show', $exercicio->id) }}" 
                                                       class="btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-play me-1"></i> Resolver
                                                    </a>
                                                @endif
                                                @if(auth()->user()->nivel >= 2)
                                                    <form action="{{ route('exercicios.destroy', $exercicio->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-tasks fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Nenhum exercício encontrado</h5>
                            @if(auth()->user()->nivel >= 2)
                                <a href="{{ route('exercicios.create', $conteudo->id) }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i> Adicionar Primeiro Exercício
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection