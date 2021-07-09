<?php

namespace App\Http\Controllers\cliente;

use App\Models\Ruta;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('solouser',['only'=> ['index']]);
    } 
    public function index()
    {
        $rutas = Ruta::paginate();

        return view('cliente.usuarioruta.index', compact('rutas'))
            ->with('i', (request()->input('page', 1) - 1) * $rutas->perPage());
    }

    
    public function show($id)
    {
        $ruta = Ruta::find($id);

        return view('cliente.usuarioruta.show', compact('ruta'));
    }


   
}
