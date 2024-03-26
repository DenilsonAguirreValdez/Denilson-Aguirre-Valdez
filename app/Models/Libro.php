<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $primaryKey = 'libroId';

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'libro_categorias', 'libroId', 'categoriaId');
    }

    public function reseñas()
    {
        return $this->hasMany(Reseña::class);
    }
}

