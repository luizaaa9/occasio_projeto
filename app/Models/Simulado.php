<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simulado extends Model
{
    protected $fillable = [
        'user_id',
        'tipo',
        'nota_linguagens',
        'nota_humanas',
        'nota_redacao',
        'nota_matematica',
        'nota_natureza',
        'tempo_final'
    ];

    public function respostas()
    {
        return $this->hasMany(RespostaSimulado::class);
    }
}
