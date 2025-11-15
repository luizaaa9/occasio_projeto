<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespostaSimulado extends Model
{
    protected $fillable = [
        'simulado_id',
        'questao_id',
        'resposta_marcada'
    ];

    public function questao(){
        return $this->belongsTo(Questao::class);
    }
}
