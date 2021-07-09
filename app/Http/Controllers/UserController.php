<?php

namespace App\Http\Controllers;


use App\Models\Promocione;
use App\Models\Equipo;
use App\Models\Ruta;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('solouser',['only'=> ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Promociones = DB::table('promociones')
        ->join('equipos', 'equipos.id', '=', 'promociones.equipoID')
        ->join('rutas', 'rutas.id', '=', 'promociones.rutasID')
        ->select('promociones.*', 'rutas.imagen', 'rutas.titulo','equipos.descripcion_equipo')
        ->get();
        $rutas = Ruta::paginate();
        $comentario = new Comentario();

        return view('cliente.usuariopromocione.index', compact('Promociones','rutas','comentario'))
        ->with('i', (request()->input('page', 1) - 1));
       // return view('cliente.usuariopromocione.index');//
    }
}

   