@extends('layouts.app')

@section('title', 'Criar Exercício')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Criar Novo Exercício - {{ $conteudo->nome }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('exercicios.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="conteudo_id" value="{{ $conteudo->id }}">

                        <div class="mb-3">
                            <label for="nivel_dificuldade" class="form-label">Nível de Dificuldade:</label>
                            <select name="nivel_dificuldade" id="nivel_dificuldade" class="form-select" required>
                                <option value="">Selecione o nível</option>
                                <option value="Fácil">Fácil</option>
                                <option value="Médio">Médio</option>
                                <option value="Difícil">Difícil</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="enunciado" class="form-label">Enunciado:</label>
                            <textarea name="enunciado" id="enunciado" class="form-control" rows="4" required>{{ old('enunciado') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Opções de Resposta:</label>
                            
                            <div class="row mb-2">
                                <div class="col-10">
                                    <label for="opcao_a" class="form-label">Opção A:</label>
                                    <input type="text" name="opcao_a" id="opcao_a" class="form-control" value="{{ old('opcao_a') }}" required>
                                </div>
                                <div class="col-2">
                                    <div class="form-check pt-4">
                                        <input class="form-check-input" type="radio" name="resposta" value="A" required>
                                        <label class="form-check-label">Correta</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col-10">
                                    <label for="opcao_b" class="form-label">Opção B:</label>
                                    <input type="text" name="opcao_b" id="opcao_b" class="form-control" value="{{ old('opcao_b') }}" required>
                                </div>
                                <div class="col-2">
                                    <div class="form-check pt-4">
                                        <input class="form-check-input" type="radio" name="resposta" value="B">
                                        <label class="form-check-label">Correta</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col-10">
                                    <label for="opcao_c" class="form-label">Opção C:</label>
                                    <input type="text" name="opcao_c" id="opcao_c" class="form-control" value="{{ old('opcao_c') }}" required>
                                </div>
                                <div class="col-2">
                                    <div class="form-check pt-4">
                                        <input class="form-check-input" type="radio" name="resposta" value="C">
                                        <label class="form-check-label">Correta</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col-10">
                                    <label for="opcao_d" class="form-label">Opção D:</label>
                                    <input type="text" name="opcao_d" id="opcao_d" class="form-control" value="{{ old('opcao_d') }}" required>
                                </div>
                                <div class="col-2">
                                    <div class="form-check pt-4">
                                        <input class="form-check-input" type="radio" name="resposta" value="D">
                                        <label class="form-check-label">Correta</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col-10">
                                    <label for="opcao_e" class="form-label">Opção E:</label>
                                    <input type="text" name="opcao_e" id="opcao_e" class="form-control" value="{{ old('opcao_e') }}" required>
                                </div>
                                <div class="col-2">
                                    <div class="form-check pt-4">
                                        <input class="form-check-input" type="radio" name="resposta" value="E">
                                        <label class="form-check-label">Correta</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('conteudos.exercicios', $conteudo->id) }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Salvar Exercício
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection