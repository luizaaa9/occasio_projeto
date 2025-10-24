<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'nivel.usuario' => \App\Http\Middleware\NivelUsuario::class,
        'nivel.professor' => \App\Http\Middleware\NivelProfessor::class,
        'nivel.admin' => \App\Http\Middleware\NivelAdmin::class,
        'verificarNivel' => \App\Http\Middleware\VerificarNivel::class,

    ]);
})

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
