<?php

namespace App\Http\Controllers;
use App\Models\Promocione;
use App\Models\Equipo;
use App\Models\Ruta;
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
        ->get();

        $rutas = Ruta::paginate();


        return view('rutaspublico.index', compact('Promociones','rutas'))
            ->with('i', (request()->input('page', 1) - 1) * $rutas->perPage());
    }

    
    public function show($id)
    {
        $ruta = Ruta::find($id);

        return view('rutaspublico.show', compact('ruta'));
    }


   
}
