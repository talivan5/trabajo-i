<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'movilidad',
        'latitud',
        'longitud',
        'imagen'
    ];
}
