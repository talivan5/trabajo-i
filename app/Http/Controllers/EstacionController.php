<?php

namespace App\Http\Controllers;
use App\Traits\UploadImage;
use App\Estacion;
use Exception;
use Illuminate\Http\Request;


class EstacionController extends Controller
{
    public function index()
    {
       $estacions = Estacion::orderBy('id', 'DESC')->get();
       $data = [
            'estacions' => $estacions,
       ];
       return response()->json($data, 200);
    }


    public function QuienesSomos()
    {
        return view('QuienesSomos');
    }

    public function VisionMision()
    {
        return view('VisionMision');
    }

    public function historia()
    {
        return view('historia');
    }
    
    public function store(Request $request)
    {
      $estacion = new Estacion();
      $estacion->nombre_estacion = $request->nombre_estacion;
      $estacion->provincia_localidad = $request->provincia_localidad;
      $estacion->municipio = $request->municipio;
      $estacion->fecha_inicio = $request->fecha_inicio;
      $estacion->fecha_fin = $request->fecha_fin;
      $estacion->latitud= $request->latitud;
      $estacion->longitud= $request->longitud;
      $estacion->altura = $request->altura;
      $estacion->imagen = $request->imagen;
      $estacion->tipo_estacion = $request->tipo_estacion;
      $estacion->datos = $request->datos;
      $estacion->observaciones = $request->observaciones;
      $estacion->estado = $request->estado;
      $estacion->sensor_id = $request->sensor_id;
      if($estacion->imagen){
         try {
            $destination_path='public/img/estaciones';
            $imagen = $request->file('imagen');
            $imagen_name = $imagen->getClientOriginalName();
            $path = $request->file('imagen')->storeAs($destination_path, $imagen_name);
            $estacion->imagen = $imagen_name;
        } catch (Exception $e) {
            //Write your error message here
        }
      }
      $estacion->save();
      return response()->json($data,200);
    }

    public function show($id=0)
    {
        return Estacion::findOrFail((int) $id); 
    }

    public function update(Request $request, $id)
    {
        $estacion = Estacion::findOrfail($id);
        $estacion->nombre_estacion = $request->nombre_estacion;
        $estacion->provincia_localidad = $request->provincia_localidad;
        $estacion->municipio = $request->municipio;
        $estacion->fecha_inicio = $request->fecha_inicio;
        $estacion->fecha_fin = $request->fecha_fin;
        $estacion->latitud= $request->latitud;
        $estacion->longitud= $request->longitud;
        $estacion->altura = $request->altura;
        $estacion->imagen = $request->imagen;
        $estacion->tipo_estacion = $request->tipo_estacion;
        $estacion->datos = $request->datos;
        $estacion->observaciones = $request->observaciones;
        $estacion->estado = $request->estado;
        $estacion->sensor_id = $request->sensor_id;
        $estacion->save();

        $data =[
            'status' => 'ok',
            'mensaje' => 'Se modifico correctamente',
        ];

        return response()->json($data,200);
    }

    public function destroy($id)
    {
        $estacion = Estacion::findOrfail($id);
        $estacion->delete();

        $data =[
            'status' => 'ok',
            'mensaje' => 'Se elimino correctamente',
        ];

        return response()->json($data, 204);
    }

}

