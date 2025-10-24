<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Sistema Educacional</a>

    <ul class="navbar-nav ms-auto">
      @auth
        <li class="nav-item"><a class="nav-link" href="{{ route('conteudos.index') }}">Conteúdos</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('exercicios.index') }}">Exercícios</a></li>

        @if(auth()->user()->nivel >= 2)
          <li class="nav-item"><a class="nav-link" href="{{ route('videos.index') }}">Vídeos</a></li>
        @endif

        @if(auth()->user()->nivel == 3)
          <li class="nav-item"><a class="nav-link" href="{{ route('materiais.index') }}">Materiais</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('usuarios.index') }}">Usuários</a></li>
        @endif

        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-link nav-link" type="submit">Sair</button>
          </form>
        </li>
      @endauth
    </ul>
  </div>
</nav>
