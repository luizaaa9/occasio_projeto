<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Ocassio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('aulas.areas') }}">Aulas</a>
            <a href="{{ route('simulado.escolher') }}">Simulados</a>
        </nav>
        <div>
            Olá, {{ auth()->user()->name }} |
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit">Sair</button>
            </form>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
