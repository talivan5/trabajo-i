<?php

namespace App\Http\Controllers;
use App\Traits\UploadImage;
use App\Provincia;
use Exception;
use Illuminate\Http\Request;


class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $provincias = Provincia::orderBy('id', 'DESC')->get();
       $data = [
            'provincias' => $provincias,
       ];
       return response()->json($data, 200);
    }


    public function vision()
    {
        return view('vision');
    }

    public function mision()
    {
        return view('mision');
    }

    public function historia()
    {
        return view('historia');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $provincia = new Provincia();
      $provincia->nombre = $request->nombre;
      $provincia->descripcion= $request->descripcion;
      $provincia->movilidad= $request->movilidad;
      $provincia->latitud= $request->latitud;
      $provincia->longitud= $request->longitud;
    //   $provincia->imagen = $request->imagen;
    //   if($provincia->imagen){
    //      try {
    //       $filePath = $this->UserImageUpload($provincia->imagen); //Passing $data->image as parameter to our created method
    //       $provincia->imagen = $filePath;
    //     } catch (Exception $e) {
    //         //Write your error message here
    //     }
    //   }
      $provincia->save();
      $data = [
          'provincia_id' => $provincia->id,
      ];
      return response()->json($data,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show(Provincia $provincia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit(Provincia $provincia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provincia = Provincia::findOrfail($id);
        $provincia->nombre= $request->nombre;
        $provincia->descripcion= $request->descripcion;
        $provincia->movilidad = $request->movilidad;
        $provincia->latitud= $request->latitud;
        $provincia->longitud= $request->longitud;
        $provincia->save();

        $data =[
            'status' => 'ok',
            'mensaje' => 'Se modifico correctamente',
        ];

        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
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

