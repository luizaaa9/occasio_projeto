<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materiais';

    protected $fillable = [
        'titulo',
        'arquivo',
        'descricao',
        'conteudo_id',
    ];

    public function conteudo()
    {
        return $this->belongsTo(Conteudo::class);
    }
}