<?php

namespace App\Http\Controllers;
use App\Traits\UploadImage;
use App\Provincia;
use Exception;
use Illuminate\Http\Request;


class ProvinciaController extends Controller
{
    public function index()
    {
       $provincias = Provincia::orderBy('id', 'DESC')->get();
       $data = [
            'provincias' => $provincias,
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
      $provincia = new Provincia();
      $provincia->nombre = $request->nombre;
      $provincia->descripcion= $request->descripcion;
      $provincia->movilidad= $request->movilidad;
      $provincia->latitud= $request->latitud;
      $provincia->longitud= $request->longitud;
      $provincia->imagen = $request->imagen;
      if($provincia->imagen){
         try {
            $destination_path='public/img/estaciones';
            $imagen = $request->file('imagen');
            $imagen_name = $imagen->getClientOriginalName();
            $path = $request->file('imagen')->storeAs($destination_path, $imagen_name);
            $provincia->imagen = $imagen_name;
        } catch (Exception $e) {
            //Write your error message here
        }
      }
      $provincia->save();
      return response()->json($data,200);
    }

    public function update(Request $request, $id)
    {
        $provincia = Provincia::findOrfail($id);
        $provincia->nombre= $request->nombre;
        $provincia->descripcion= $request->descripcion;
        $provincia->movilidad = $request->movilidad;
        $provincia->latitud= $request->latitud;
        $provincia->longitud= $request->longitud;
        $provincia->imagen= $request->imagen;
        $provincia->save();

        $data =[
            'status' => 'ok',
            'mensaje' => 'Se modifico correctamente',
        ];

        return response()->json($data,200);
    }

    public function destroy($id)
    {
        $provincia = Provincia::findOrfail($id);
        $provincia->delete();

        $data =[
            'status' => 'ok',
            'mensaje' => 'Se elimino correctamente',
        ];

        return response()->json($data, 204);
    }

}

