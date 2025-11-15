@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Criar Nova Anotação</h2>

    <form action="{{ route('anotacoes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" class="form-control" rows="10" style="resize: vertical;" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('anotacoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea[name="conteudo"]',
    height: 400,
    menubar: false,
    plugins: 'link lists table code',
    toolbar: 'undo redo | bold italic underline | bullist numlist | link table | code',
    branding: false
  });
</script>

