<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'conteudo_id',
        'nivel_dificuldade',
        'enunciado',
        'opcao_a',
        'opcao_b',
        'opcao_c',
        'opcao_d',
        'opcao_e',
        'resposta',
    ];

    public function conteudo()
    {
        return $this->belongsTo(Conteudo::class);
    }
    
    public function getOpcoesAttribute()
    {
        return [
            'A' => $this->opcao_a,
            'B' => $this->opcao_b,
            'C' => $this->opcao_c,
            'D' => $this->opcao_d,
            'E' => $this->opcao_e,
        ];
    }
}