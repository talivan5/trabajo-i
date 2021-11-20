<?php

namespace App\Http\Controllers;
use App\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::orderBy('id', 'DESC')->get();
        $data = [
             'noticias' => $noticias,
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->descripcion_corta= $request->descripcion_corta;
        $noticia->descripcion= $request->descripcion;
        $noticia->imagen = $request->imagen;
        if($noticia->imagen){
           try {
              $destination_path='public/img/noticias';
              $imagen = $request->file('imagen');
              $imagen_name = $imagen->getClientOriginalName();
              $path = $request->file('imagen')->storeAs($destination_path, $imagen_name);
              $noticia->imagen = $imagen_name;
          } catch (Exception $e) {
              //Write your error message here
          }
        }
        $noticia->save();
        return response()->json($data,200);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrfail($id);
        $noticia->titulo = $request->titulo;
        $noticia->descripcion_corta= $request->descripcion_corta;
        $noticia->descripcion= $request->descripcion;
        $noticia->imagen = $request->imagen;
        $noticia->save();

        $data =[
            'status' => 'ok',
            'mensaje' => 'Se modifico correctamente',
        ];

        return response()->json($data,200);
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrfail($id);
        $noticia->delete();

        $data =[
            'status' => 'ok',
            'mensaje' => 'Se elimino correctamente',
        ];

        return response()->json($data, 204);
    }
}
