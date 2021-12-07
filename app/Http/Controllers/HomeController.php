<?php

namespace App\Http\Controllers;

use App\Estacion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $estacions = Estacion::orderBy('id', 'DESC')->get();
        return view('home', compact('estacions'));
    }
}
