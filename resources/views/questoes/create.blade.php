@extends('layouts.app')

@section('content')

<h1>Criar Questão</h1>

<form method="POST" action="{{ route('questoes.store') }}">
    @csrf

    <label>Enunciado:</label><br>
    <textarea name="enunciado" required></textarea><br><br>

    <label>A:</label><input name="a" required><br>
    <label>B:</label><input name="b" required><br>
    <label>C:</label><input name="c" required><br>
    <label>D:</label><input name="d" required><br>
    <label>E:</label><input name="e" required><br><br>

    <label>Alternativa correta:</label>
    <select name="correta" required>
        <option value="a">A</option>
        <option value="b">B</option>
        <option value="c">C</option>
        <option value="d">D</option>
        <option value="e">E</option>
    </select>

    <br><br>
    <button type="submit">Salvar</button>
</form>

@endsection
