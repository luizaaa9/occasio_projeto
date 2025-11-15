<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    use HasFactory;

     protected $table = 'questoes'; 

    protected $fillable = [
        'disciplina_id',
        'enunciado',
        'alternativa_a',
        'alternativa_b',
        'alternativa_c',
        'alternativa_d',
        'alternativa_e',
        'correta',
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function conteudo()
    {
        return $this->belongsTo(Conteudo::class);
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
