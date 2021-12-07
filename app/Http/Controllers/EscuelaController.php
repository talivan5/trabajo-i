<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escuela;

class EscuelaController extends Controller
{
   
    public function index()
    {
        $escuelas=Escuela::orderBy('id', 'DESC')->get();
        $data=[
            'escuelas'=>$escuelas
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $escuela = new Escuela();
        $escuela->nombre = $request->nombre;
        $escuela->latitud= $request->latitud;
        $escuela->longitud= $request->longitud;
        $escuela->poblacion_id= $request->poblacion_id;
        $escuela->save();

        $data=[
            'escuela_id'=>$escuela_id,
        ];
        return response()->json($data, 200);
    }

    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $escuela = Escuela::findOrfail($id);
        $escuela->nombre = $request->nombre;
        $escuela->latitud= $request->latitud;
        $escuela->longitud= $request->longitud;
        $escuela->poblacion_id= $request->poblacion_id;
        $escuela->save();

        return response()->json('Se actualizo correctamente', 200);
    }

    public function destroy($id)
    {
        $escuela= Escuela::findOrfail($id);
        $escuela->delete();
        $data =[
            'status' => 'ok',
            'mensaje' => 'Se elimino correctamente'
        ];

        return response()->json($data, 204);
    }
}
