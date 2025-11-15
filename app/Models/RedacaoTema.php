<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedacaoTema extends Model
{
    protected $fillable = [
        'tema',
        'texto1',
        'texto2',
        'imagem1',
        'imagem2'
    ];
}
