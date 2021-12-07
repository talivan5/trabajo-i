<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    protected $fillable = [
        'estacion',
        'latitud',
        'longitud'
    ];

    public function escuelas(){
        return $this->hasMany('App\Escuela');
    }
}
