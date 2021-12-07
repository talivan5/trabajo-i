<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $fillable = [
        'nombre',
        'latitud',
        'longitud',
        'poblacion_id'
    ];

    public function poblacion(){
        return $this->belongsTo('App\Poblacion', 'poblacion_id');
    }
}
