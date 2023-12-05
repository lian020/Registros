<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function documentos(){


        return $this->belongsTo(Documento::class,'Codigo_tipo_documento');
    }

    public function registros()
    {

        return $this->hasMany(Registro::class,'id');

    }




}
