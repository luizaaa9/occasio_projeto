<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedacaoMotivador extends Model
{
    protected $fillable = [
        'tema_id',
        'texto',
        'imagem'
    ];

    public function tema()
    {
        return $this->belongsTo(RedacaoTema::class, 'tema_id');
    }
}
