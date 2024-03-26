<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'usuarioId';

    public function librosReservados()
    {
        return $this->hasMany(Libro::class);
    }

    public function reseñas()
    {
        return $this->hasMany(Reseña::class);
    }
}
