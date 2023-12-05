<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function tecnicos(){

        return $this->belongsTo(Tecnico::class,'codigo_tecnico');
    }

    public function equipos(){

        return $this->belongsTo(Equipo::class,'codigo_equipo');
    }

    public function institutos(){

        return $this->belongsTo(Instituto::class,'codigo_instituto');
    }

    public function marcas(){

        return $this->belongsTo(Marca::class,'codigo_marca');
    }

    public function estados(){

        return $this->belongsTo(Estado::class,'codigo_estado');
    }
}
