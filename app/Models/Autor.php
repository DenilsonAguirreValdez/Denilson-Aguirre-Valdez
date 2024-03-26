<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $primaryKey = 'autorId';

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
