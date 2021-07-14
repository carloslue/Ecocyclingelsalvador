<?php

namespace App\Http\Controllers\administrador;

use App\Models\Equipo;
use Illuminate\Http\Request;




class EquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    }
   
    public function index(Request $request )
    {
        
        $total=Equipo::count();
        if($request){
            $query =trim($request->get('buscar'));
            $equipos = Equipo::where('descripcion_equipo','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->get();
            return view('Administrador.equipo.index', compact('equipos','query','total'))
            ->with('i', (request()->input('page', 1) - 1));

        }

      

        
    }

   
    public function create()
    {
        $equipo = new Equipo();
        return view('Administrador.equipo.create', compact('equipo'));
    }

   
    public function store(Request $request)
    {
        request()->validate(Equipo::$rules);

        $equipo = Equipo::create($request->all());

        return redirect()->route('equipos')
            ->with('success', 'Nuevo equipo agregado a tu lista.');
    }

   
    public function show($id)
    {
        $equipo = Equipo::find($id);

        return view('Administrador.equipo.show', compact('equipo'));
    }

    
    public function edit($id)
    {
        $equipo = Equipo::find($id);

        return view('Administrador.equipo.edit', compact('equipo'));
    }

   
    public function update(Request $request, Equipo $equipo)
    {
        request()->validate(Equipo::$rules);

        $equipo->update($request->all());

        return redirect()->route('equipos')
            ->with('success', 'Equipo actualizado exitosamente');
    }

   
    public function destroy($id)
    {
       
           try {
            Equipo::find($id)->delete();
           
            return redirect()->route('equipos')
            ->with('success','Registro eliminado correctamente');
            } catch (\Illuminate\Database\QueryException $e) {
               
                return redirect()->route('equipos')
                ->with('success','Registro relacionado, imposible de eliminar');
            } 
        
    }
}
