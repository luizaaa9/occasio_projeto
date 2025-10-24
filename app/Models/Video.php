<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function conteudo()
{
    return $this->belongsTo(Conteudo::class);
}

}
