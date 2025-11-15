<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\ConteudoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ExercicioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimuladoController;
use App\Http\Controllers\QuestaoController;
use App\Http\Controllers\RedacaoTemaController;
use App\Http\Controllers\AnotacaoController;

require __DIR__.'/auth.php';

Route::get('/', fn() => redirect('/login'));

Route::middleware('auth')->group(function() {

    Route::get('/', [\App\Http\Controllers\AnotacaoController::class, 'index'])
        ->name('home');

    Route::get('/anotacoes', [AnotacaoController::class, 'index'])->name('anotacoes.index');
    Route::get('/anotacoes/create', [AnotacaoController::class, 'create'])->name('anotacoes.create');
    Route::post('/anotacoes', [AnotacaoController::class, 'store'])->name('anotacoes.store');
    Route::get('/anotacoes/{anotacao}', [AnotacaoController::class, 'show'])->name('anotacoes.show');
    Route::get('/anotacoes/{anotacao}/edit', [AnotacaoController::class, 'edit'])->name('anotacoes.edit');
    Route::put('/anotacoes/{anotacao}', [AnotacaoController::class, 'update'])->name('anotacoes.update');
    Route::delete('/anotacoes/{anotacao}', [AnotacaoController::class, 'destroy'])->name('anotacoes.destroy');


    // Aulas
    Route::get('/aulas', [AreaController::class, 'index'])->name('aulas.areas');
    Route::get('/aulas/{area}', [DisciplinaController::class, 'porArea'])->name('aulas.disciplinas');
    Route::get('/aulas/{area}/{disciplina}', [ConteudoController::class, 'porDisciplina'])->name('aulas.conteudos');

    Route::get('/conteudo/{conteudo}', [ConteudoController::class, 'show'])->name('conteudos.show');
    Route::get('/conteudo/{conteudo}/videos', [VideoController::class, 'index'])->name('conteudos.videos');
    Route::get('/conteudo/{conteudo}/materiais', [MaterialController::class, 'index'])->name('conteudos.materiais');
    Route::get('/conteudo/{conteudo}/exercicios', [ExercicioController::class, 'index'])->name('conteudos.exercicios');

    // ADM nível 2
    Route::middleware('verificarNivel:2')->group(function() {
        Route::resource('conteudos', ConteudoController::class)->except(['show']);
        Route::resource('videos', VideoController::class);
        Route::resource('materiais', MaterialController::class);
        Route::resource('exercicios', ExercicioController::class);
        Route::resource('questoes', QuestaoController::class);
        Route::resource('redacao_temas', RedacaoTemaController::class);
    });

    // Usuário nível 1
    Route::middleware('verificarNivel:1')->group(function() {
        Route::post('/exercicios/resolver', [ExercicioController::class, 'resolver'])->name('exercicios.resolver');
        Route::get('/exercicios/{exercicio}', [ExercicioController::class, 'show'])->name('exercicios.show');
    });

    // ADM máximo nível 3
    Route::middleware('verificarNivel:3')->group(function() {
        Route::resource('/areas', AreaController::class);
        Route::resource('/disciplinas', DisciplinaController::class);
    });

    // SIMULADO
    Route::prefix('simulado')->group(function () {

        Route::get('/escolher', [SimuladoController::class, 'escolher'])
            ->name('simulado.escolher');

        Route::get('/regras/{tipo}', [SimuladoController::class, 'regras'])
            ->name('simulado.regras');

        Route::get('/iniciar/{tipo}', [SimuladoController::class, 'iniciar'])
            ->name('simulado.iniciar');

        Route::post('/{id}/responder', [SimuladoController::class, 'responder'])
            ->name('simulado.responder');

        Route::post('/{simulado}/finalizar', [SimuladoController::class, 'finalizar'])
            ->name('simulado.finalizar');

        Route::get('/{simulado}/resultado', [SimuladoController::class, 'resultado'])
            ->name('simulado.resultado');
    });

});
