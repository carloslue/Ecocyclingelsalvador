<?php

namespace App\Http\Controllers\administrador;

use App\Models\Informacion;
use Illuminate\Http\Request;


class InformacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    } 


    public function index()
    { 
        $total=Informacion::count();
        $informacions = Informacion::paginate();

        return view('Administrador.informacion.index', compact('informacions','total'))
            ->with('i', (request()->input('page', 1) - 1) * $informacions->perPage());
    }

   
    public function create()
    {
        $informacion = new Informacion();
        return view('Administrador.informacion.create', compact('informacion'));
    }

   
    public function store(Request $request)
    {
        request()->validate(Informacion::$rules);

        $informacion = Informacion::create($request->all());

        return redirect()->route('informacion')
            ->with('success', 'Informacion creado correctamente.');
    }

   
    public function show($id)
    {
        $informacion = Informacion::find($id);

        return view('Administrador.informacion.show', compact('informacion'));
    }

   
    public function edit($id)
    {
        $informacion = Informacion::find($id);

        return view('Administrador.informacion.edit', compact('informacion'));
    }

   
    public function update(Request $request, Informacion $informacion)
    {
        request()->validate(Informacion::$rules);

        $informacion->update($request->all());

        return redirect()->route('informacion')
            ->with('success', 'Informacion actualizada con exito');
    }

   
    public function destroy($id)
    {
        $informacion = Informacion::find($id)->delete();

        return redirect()->route('informacion')
            ->with('success', 'Informacion de empresa eliminado');
    }
}
