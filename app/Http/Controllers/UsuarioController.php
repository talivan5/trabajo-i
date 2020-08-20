<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
class UsuarioController extends Controller
{
    public function index()
    {
       $usuarios = User::orderBy('id', 'DESC')->get();

       $data = [
            'usuarios' => $usuarios,
       ];
       return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name  = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->remember_token = Str::random(10);
        $usuario->save();
        $data = [
            'user_id' => $usuario->id,
        ];

        return response()->json($data,200);
    }


    public function update(Request $request, $id)
    {
        $usuario = User::findOrfail($id);
        $usuario->name  = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->remember_token = Str::random(10);
        $usuario->save();
        $data = [
            'status' => 'ok',
            'mensaje' => 'se modifico correctamente',
        ];

        return response()->json($data,200);
    }

    public function destroy($id)
    {
        $usuario = User::findOrfail($id);
        $usuario->delete();
        $data = [
            'status' => 'ok',
            'mensaje' => 'Se elimino correctamente'
        ];
        return response()->json($data,204);
    }
}
