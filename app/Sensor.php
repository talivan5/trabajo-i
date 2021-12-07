<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'estacion_id'
    ];

    public function estacion()
    {
        return $this->belongsTo('App\Estacion');
    }
}
