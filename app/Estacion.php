<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacion extends Model
{
    protected $fillable = [
        'nombre_estacion',
        'provincia_localidad',

        'municipio',
        'fecha_inicio',
        
        'fecha_fin',
        'latitud',
        
        'longitud',
        'altura',
        
        'imagen',
        
        'tipo_estacion',
        
        'datos',
        'observaciones',
        'estado'
    ];

    public function sensors()
    {
        return $this->hasMany('App\Sensor');
    }

}
