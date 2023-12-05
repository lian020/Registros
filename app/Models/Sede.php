<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $fillable =['Nombre_sede'];

    public function institutos()
    {
        return $this->hasMany(Instituto::class,'id');

    }
}
