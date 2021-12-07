<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;
use App\Estacion;

class SensorController extends Controller
{
   
    public function index()
    {
        $sensors=Sensor::with('estacion')->orderBy('id', 'DESC')->get();
        $data=[
            'sensors'=>$sensors,
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $sensor = new Sensor();
        $sensor->nombre = $request->nombre;
        $sensor->descripcion= $request->descripcion;
        $sensor->estacion_id= $request->estacion_id;
        $sensor->save();

        $data=[
            'sensor'=>$sensor,
        ];
        return response()->json($data, 200);
    }

    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $sensor = Sensor::findOrfail($id);
        $sensor->nombre = $request->nombre;
        $sensor->descripcion= $request->descripcion;
        $sensor->estacion_id = $request->estacion_id;
        $sensor->save();
        return response()->json('Se actualizo correctamente', 200);
    }

    public function destroy($id)
    {
        $sensor= Sensor::findOrfail($id);
        $sensor->delete();
        $data =[
            'status' => 'ok',
            'mensaje' => 'Se elimino correctamente'
        ];

        return response()->json($data, 204);
    }
}
