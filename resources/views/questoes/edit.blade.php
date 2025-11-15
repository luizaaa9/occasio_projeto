@extends('layouts.app')

@section('title', 'Editar Questão')

@section('content')
<h1>Editar Questão</h1>

<form action="{{ route('questoes.update', $questao->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Enunciado:</label><br>
    <textarea name="enunciado" rows="5" style="width:100%">{{ $questao->enunciado }}</textarea><br><br>

    <label>Alternativa A:</label>
    <input type="text" name="a" value="{{ $questao->a }}" style="width:100%"><br>

    <label>Alternativa B:</label>
    <input type="text" name="b" value="{{ $questao->b }}" style="width:100%"><br>

    <label>Alternativa C:</label>
    <input type="text" name="c" value="{{ $questao->c }}" style="width:100%"><br>

    <label>Alternativa D:</label>
    <input type="text" name="d" value="{{ $questao->d }}" style="width:100%"><br>

    <label>Alternativa E:</label>
    <input type="text" name="e" value="{{ $questao->e }}" style="width:100%"><br><br>

    <label>Resposta Correta:</label>
    <input type="text" name="correta" value="{{ $questao->correta }}" maxlength="1"><br><br>

    <label>Disciplina:</label>
    <select name="disciplina_id">
        @foreach($disciplinas as $d)
        <option value="{{ $d->id }}" {{ $questao->disciplina_id == $d->id ? 'selected' : '' }}>
            {{ $d->nome }}
        </option>
        @endforeach
    </select><br><br>

    <button type="submit">Salvar Alterações</button>
</form>
@endsection
