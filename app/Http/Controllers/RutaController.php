<?php

namespace App\Http\Controllers;
use App\Models\Promocione;
use App\Models\Equipo;
use App\Models\Ruta;
use App\Models\Informacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RutaController extends Controller
{
    
  

    public function index()
    {
        
        $Promociones = DB::table('promociones')
        ->join('equipos', 'equipos.id', '=', 'promociones.equipoID')
        ->join('rutas', 'rutas.id', '=', 'promociones.rutasID')
        ->select('promociones.*', 'rutas.titulo','rutas.imagen','equipos.descripcion_equipo')
        ->where("promociones.estado","=","abilitado")
        ->get();

        $rutas = Ruta::where("rutas.estado","=","abilitado")->paginate();
        $informacions = Informacion::paginate();
       
        return view('rutaspublico.index', compact('Promociones','rutas','informacions'))
            ->with('i', (request()->input('page', 1) - 1) * $rutas->perPage());
    }

    
    public function show($id)
    {
        $ruta = Ruta::find($id);

        return view('rutaspublico.show', compact('ruta'));
    }


   
}
