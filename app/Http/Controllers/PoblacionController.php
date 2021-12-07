<?php

namespace App\Http\Controllers;
use App\Poblacion;
use Illuminate\Http\Request;

class PoblacionController extends Controller
{
    public function index()
    {
        $poblacions = Poblacion::orderBy('id', 'DESC')->get();
        $data = [
             'poblacions' => $poblacions,
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $poblacion = new Poblacion();
        $poblacion->estacion = $request->estacion;
        $poblacion->latitud= $request->latitud;
        $poblacion->longitud= $request->longitud;
        $poblacion->save();
        return response()->json($data,200);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $poblacion = Poblacion::findOrfail($id);
        $poblacion->estacion= $request->estacion;
        $poblacion->latitud= $request->latitud;
        $poblacion->longitud= $request->longitud;
        $poblacion->save();

        $data =[
            'status' => 'ok',
            'mensaje' => 'Se modifico correctamente',
        ];

        return response()->json($data,200);
    }

    public function destroy($id)
    {
        $poblacion = Poblacion::findOrfail($id);
        $poblacion->delete();
        $data =[
            'status' => 'ok',
            'mensaje' => 'Se elimino correctamente',
        ];
        return response()->json($data, 204);
    }
}
