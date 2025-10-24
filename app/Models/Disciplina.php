<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    public function area()
{
    return $this->belongsTo(Area::class);
}

public function conteudos()
{
    return $this->hasMany(Conteudo::class);
}

public function getRouteKeyName()
{
    return 'slug'; 
}

}
