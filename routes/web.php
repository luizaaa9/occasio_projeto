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


require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function() {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/aulas', [AreaController::class, 'index'])->name('aulas.areas');

    Route::get('/aulas/{area}', [DisciplinaController::class, 'porArea'])
        ->name('aulas.disciplinas');

    Route::get('/aulas/{area}/{disciplina}', [ConteudoController::class, 'porDisciplina'])
        ->name('aulas.conteudos');

    Route::get('/conteudo/{conteudo}', [ConteudoController::class, 'show'])
        ->name('conteudos.show');

    Route::get('/conteudo/{conteudo}/videos', [VideoController::class, 'index'])
        ->name('conteudos.videos');

    Route::get('/conteudo/{conteudo}/materiais', [MaterialController::class, 'index'])
        ->name('conteudos.materiais');

    Route::get('/conteudo/{conteudo}/exercicios', [ExercicioController::class, 'index'])
        ->name('conteudos.exercicios');

    Route::middleware('verificarNivel:2')->group(function() {

        Route::get('/conteudos/create', [ConteudoController::class, 'create'])->name('conteudos.create');
        Route::post('/conteudos', [ConteudoController::class, 'store'])->name('conteudos.store');
        Route::get('/conteudos/{conteudo}/edit', [ConteudoController::class, 'edit'])->name('conteudos.edit');
        Route::put('/conteudos/{conteudo}', [ConteudoController::class, 'update'])->name('conteudos.update');
        Route::delete('/conteudos/{conteudo}', [ConteudoController::class, 'destroy'])->name('conteudos.destroy');

    
        Route::get('/videos/create/{conteudo}', [VideoController::class, 'create'])->name('videos.create');
        Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
        Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
        Route::put('/videos/{video}', [VideoController::class, 'update'])->name('videos.update');
        Route::delete('/videos/{video}', [VideoController::class, 'destroy'])->name('videos.destroy');

        Route::get('/materiais/create/{conteudo}', [MaterialController::class, 'create'])->name('materiais.create');
        Route::post('/materiais', [MaterialController::class, 'store'])->name('materiais.store');
        Route::get('/materiais/{material}/edit', [MaterialController::class, 'edit'])->name('materiais.edit');
        Route::put('/materiais/{material}', [MaterialController::class, 'update'])->name('materiais.update');
        Route::delete('/materiais/{material}', [MaterialController::class, 'destroy'])->name('materiais.destroy');

        Route::get('/exercicios/create/{conteudo}', [ExercicioController::class, 'create'])->name('exercicios.create');
        Route::post('/exercicios', [ExercicioController::class, 'store'])->name('exercicios.store');
        Route::get('/exercicios/{exercicio}/edit', [ExercicioController::class, 'edit'])->name('exercicios.edit');
        Route::put('/exercicios/{exercicio}', [ExercicioController::class, 'update'])->name('exercicios.update');
        Route::delete('/exercicios/{exercicio}', [ExercicioController::class, 'destroy'])->name('exercicios.destroy');
    });


    Route::middleware('verificarNivel:1')->group(function() {
        Route::post('/exercicios/resolver', [ExercicioController::class, 'resolver'])
            ->name('exercicios.resolver');

        Route::get('/exercicios/{exercicio}', [ExercicioController::class, 'show'])
            ->name('exercicios.show');
    });


    Route::middleware('verificarNivel:3')->group(function() {
        Route::resource('/areas', AreaController::class);
        Route::resource('/disciplinas', DisciplinaController::class);
    });


    Route::middleware('verificarNivel:2')->group(function(){
        Route::resource('questoes', QuestaoController::class);
        Route::resource('redacao_temas', RedacaoTemaController::class);
    });


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