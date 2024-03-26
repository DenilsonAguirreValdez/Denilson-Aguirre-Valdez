<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reseña extends Model
{
    protected $primaryKey = 'reseñaId';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}