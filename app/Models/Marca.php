<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre_tipo_equipo'];

    public function registros()
    {

        return $this->hasMany(Registro::class,'id');

    }
}
