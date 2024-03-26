<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey = 'categoriaId';

    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'libro_categorias', 'categoriaId', 'libroId');
    }
}
