<?php

namespace App\Http\Controllers;

use App\Models\Questao;
use App\Models\Simulado;
use App\Models\RespostaSimulado;
use App\Models\RedacaoTema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SimuladoController extends Controller
{
    public function escolher()
    {
        return view('simulado.escolher');
    }

    public function regras($tipo)
    {
        return view('simulado.regras', compact('tipo'));
    }

    public function iniciar($tipo)
    {
        
        if($tipo === 'dia1'){
            $questoes = Questao::whereIn('disciplina_id', [
                1,2,3,4,5,6 
            ])->inRandomOrder()->limit(90)->get();

            $proposta = RedacaoTema::inRandomOrder()->first();
        }

        
        else{
            $questoes = Questao::whereIn('disciplina_id', [
                7,8,9,10 
            ])->inRandomOrder()->limit(90)->get();

            $proposta = null;
        }

        $simulado = Simulado::create([
            'user_id'=>Auth::id(),
            'tipo'=>$tipo
        ]);

        return view('simulado.fazer', compact('questoes','proposta','simulado','tipo'));
    }

    public function finalizar(Request $request, Simulado $simulado)
    {
        foreach($request->respostas as $questaoId => $alternativa){
            RespostaSimulado::create([
                'simulado_id'=>$simulado->id,
                'questao_id'=>$questaoId,
                'resposta_marcada'=>$alternativa
            ]);
        }

        
        $corretas = 0;

        foreach($simulado->respostas as $r){
            if($r->resposta_marcada == $r->questao->correta){
                $corretas++;
            }
        }

        $nota = ($corretas / 90) * 1000;

        if($simulado->tipo === 'dia1'){
            $simulado->nota_linguagens = $nota;
            $simulado->nota_humanas = $nota;
        } else {
            $simulado->nota_matematica = $nota;
            $simulado->nota_natureza = $nota;
        }

        $simulado->save();

        return view('simulado.resultado', compact('simulado'));
    }

    public function responder(Request $request, $id)
{
    $simulado = Simulado::findOrFail($id);
    $respostas = $request->input('respostas', []);
    $textoRedacao = $request->input('redacao'); 

    $questoes = Questao::whereIn('id', array_keys($respostas))->get();

    $acertos = 0;
    $resolucao = [];

    foreach ($questoes as $q) {
        $respostaUsuario = $respostas[$q->id] ?? null;
        $correta = $q->alternativa_correta;

        if ($respostaUsuario == $correta) {
            $acertos++;
        }

        $resolucao[] = [
            'enunciado' => $q->enunciado,
            'alternativas' => $q->alternativas,
            'usuario' => $respostaUsuario,
            'correta' => $correta,
            'acertou' => $respostaUsuario == $correta
        ];
    }

    $total = count($questoes);
    $media = $total > 0 ? ($acertos / $total) * 10 : 0;

    return view('simulado.resultado', [
        'simulado' => $simulado,
        'acertos' => $acertos,
        'total' => $total,
        'media' => number_format($media, 2),
        'resolucao' => $resolucao,
        'redacao' => $textoRedacao 
    ]);
}



}
