<?php

namespace App\Http\Controllers\cliente;

use App\Models\Promocione;
use App\Models\Equipo;
use App\Models\Ruta;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PromocioneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('solouser',['only'=> ['index']]);
    }
    
    public function index()
    {
     
        
            $Promociones = DB::table('promociones')
            ->join('equipos', 'equipos.id', '=', 'promociones.equipoID')
            ->join('rutas', 'rutas.id', '=', 'promociones.rutasID')
            ->select('promociones.*', 'rutas.imagen', 'rutas.titulo','equipos.descripcion_equipo')
            ->where("promociones.estado","=",'Abilitado')
            ->get();
          
            $rutas = Ruta::where("rutas.estado","=","abilitado")->paginate();
            $comentario = new Comentario();
          

        return view('cliente.usuariopromocione.index', compact('Promociones','rutas','comentario'))
            ->with('i', (request()->input('page', 1) - 1));
    }


    public function create()
    {
        $comentario = new Comentario();
        return view('cliente.usuariopromocione.index', compact('comentario'));
    }

  
    public function store(Request $request)
    {
        request()->validate(Comentario::$rules);

        $comentario = Comentario::create($request->all());

        return redirect()->route('promocione')
            ->with('success', 'Comentario enviado.');
    }
   
   
    public function show($id)

    {
        $promociones = DB::table('promociones')
        ->join('equipos', 'equipos.id', '=', 'promociones.equipoID')
        ->join('rutas', 'rutas.id', '=', 'promociones.rutasID')
        ->select('promociones.*', 'rutas.imagen', 'rutas.titulo','equipos.descripcion_equipo')
        ->where("promociones.id","=",$id)
        ->get();
        //$promocione = Promocione::find($id);

        return view('cliente.reservaspromo.formrealizar', compact('promociones'));
    }

    

   
}
