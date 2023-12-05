<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function sedes(){


        return $this->belongsTo(Sede::class,'Codigo_sede');
    }

    public function registros()
    {

        return $this->hasMany(Registro::class,'id');

    }
}
