<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Produto extends Model
{
    protected $fillable = ['nome', 'categoria_id', 'imagem'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
