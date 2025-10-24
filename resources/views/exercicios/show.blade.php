@extends('layouts.app')

@section('title', 'Resolver Exercício')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('conteudos.exercicios', $exercicio->conteudo_id) }}">Exercícios</a></li>
                    <li class="breadcrumb-item active">Resolver</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Exercício</h4>
                        <span class="badge bg-{{ $exercicio->nivel_dificuldade == 'Fácil' ? 'success' : ($exercicio->nivel_dificuldade == 'Médio' ? 'warning' : 'danger') }}">
                            {{ $exercicio->nivel_dificuldade }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-exercicio">
                        @csrf
                        <input type="hidden" name="exercicio_id" value="{{ $exercicio->id }}">
                        
                        <div class="mb-4">
                            <h5 class="mb-3">{{ $exercicio->enunciado }}</h5>
                            
                            <div class="form-group">
                                @foreach($exercicio->opcoes as $letra => $opcao)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" 
                                               name="resposta" id="opcao{{ $letra }}" 
                                               value="{{ $letra }}" required>
                                        <label class="form-check-label" for="opcao{{ $letra }}">
                                            <strong>{{ $letra }})</strong> {{ $opcao }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="resultado" class="alert d-none"></div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('conteudos.exercicios', $exercicio->conteudo_id) }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Voltar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check me-1"></i> Verificar Resposta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('form-exercicio').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const resultado = document.getElementById('resultado');
    
    fetch('{{ route("exercicios.resolver") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.correto) {
            resultado.className = 'alert alert-success';
            resultado.innerHTML = `
                <h5><i class="fas fa-check-circle me-2"></i>Resposta Correta!</h5>
                ${data.explicacao ? '<p class="mb-0">' + data.explicacao + '</p>' : ''}
            `;
        } else {
            resultado.className = 'alert alert-danger';
            resultado.innerHTML = `
                <h5><i class="fas fa-times-circle me-2"></i>Resposta Incorreta</h5>
                <p class="mb-1"><strong>Resposta correta:</strong> ${data.resposta_correta}</p>
                ${data.explicacao ? '<p class="mb-0">' + data.explicacao + '</p>' : ''}
            `;
        }
        resultado.classList.remove('d-none');
    })
    .catch(error => {
        console.error('Erro:', error);
        resultado.className = 'alert alert-danger';
        resultado.innerHTML = 'Erro ao verificar resposta. Tente novamente.';
        resultado.classList.remove('d-none');
    });
});
</script>
@endsection