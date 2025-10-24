<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'slug', 
        'descricao',
        'disciplina_id',
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function materiais()
{
    return $this->hasMany(Material::class);
}

    public function exercicios()
    {
        return $this->hasMany(Exercicio::class);
    }
}