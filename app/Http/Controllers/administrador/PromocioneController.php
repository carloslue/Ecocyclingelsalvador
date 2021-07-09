<?php

namespace App\Http\Controllers\administrador;

use App\Models\Promocione;
use App\Models\Equipo;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PromocioneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    }
    
    public function index(Request $request)
    {
     $total=Promocione::count();
        if($request){
            $query =trim($request->get('buscar'));
            $Promociones = DB::table('promociones')
            ->join('equipos', 'equipos.id', '=', 'promociones.equipoID')
            ->join('rutas', 'rutas.id', '=', 'promociones.rutasID')
            ->select('promociones.*', 'rutas.titulo','equipos.descripcion_equipo')
            ->where('descripcion','LIKE','%'.$query.'%')
            ->get();

          

        return view('Administrador.promocione.index', compact('Promociones','query','total'))
            ->with('i', (request()->input('page', 1) - 1));
        }
    }

   
    public function create()
    {
        $ruta=ruta::all();
        $equipos=equipo::all();
        $promocione = new Promocione();
        return view('Administrador.promocione.create', compact('promocione','ruta','equipos'));
    }

   
    public function store(Request $request)
    {
        request()->validate(Promocione::$rules);

        $promocione = Promocione::create($request->all());
      

        return redirect()->route('promociones')
            ->with('success', 'Promocion creado con exito.');
    }

   
    public function show($id)
    {
        $promocione = Promocione::find($id);

        return view('Administrador.promocione.show', compact('promocione'));
    }

   
    public function edit($id)
    {
        $ruta=ruta::all();
        $equipos=equipo::all();
        $promocione = Promocione::find($id);

        return view('Administrador.promocione.edit', compact('promocione','ruta','equipos'));
    }

   
    public function update(Request $request, Promocione $promocione)
    {
        request()->validate(Promocione::$rules);

        $promocione->update($request->all());

        return redirect()->route('promociones')
            ->with('success', 'Promocion actualizado con exito');
    }

   
    public function destroy($id)
    {
        $promocione = Promocione::find($id)->delete();

        return redirect()->route('promociones')
            ->with('success', 'Promocion eliminado con exito');
    }
}
