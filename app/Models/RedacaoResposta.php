<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedacaoResposta extends Model
{
    protected $fillable = [
        'tema_id',
        'user_id',
        'texto',
        'nota_ia',
        'comentarios_ia'
    ];

    public function tema()
    {
        return $this->belongsTo(RedacaoTema::class);
    }

    public function aluno()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
