<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre_tipo_documento'];

    public function tecnicos()
    {
        return $this->hasMany(Tecnico::class,'id');

    }
}
