<?php

namespace App\Http\Controllers\administrador;

use App\Models\Ruta;
use Illuminate\Http\Request;


class RutaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('soloadmin', ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        //CODIGO PARA OBTENER EL TOTAL DE REGISTROS// 
        $total = Ruta::count();

        //codigo para filtrar datos
        if ($request) {
            $query = trim($request->get('buscar'));
            $rutas = Ruta::where('titulo', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'asc')
                ->get();


            return view('Administrador.ruta.index', compact('rutas', 'query', 'total'))
                ->with('i', (request()->input('page', 1) - 1));
        }
    }


    public function create()
    {
        $ruta = new Ruta();
        return view('Administrador.ruta.create', compact('ruta'));
    }


    public function store(Request $request)
    {
        request()->validate(Ruta::$rules);


        $ruta = new Ruta();
        if ($request->hasFile('imagen')) {
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $ruta->imagen = $file->getClientOriginalName();
        }
        $ruta->titulo = request('titulo');
        $ruta->descripcion_rutas = request('descripcion_rutas');
        $ruta->costo = request('costo');
        $ruta->estado = request('estado');

        $ruta->save();

        return redirect()->route('rutas')
            ->with('success', 'Ruta creada con exito.');
    }


    public function show($id)
    {
        $ruta = Ruta::find($id);

        return view('Administrador.ruta.show', compact('ruta'));
    }


    public function edit($id)
    {
        $ruta = Ruta::find($id);

        return view('Administrador.ruta.edit', compact('ruta'));
    }




    public function update(Request $request, Ruta $ruta)
    {
        request()->validate(Ruta::$rules);

        $ruta->update($request->all());

        $file = $request->imagen;
        $ruta->titulo = request('titulo');
        $ruta->descripcion_rutas = request('descripcion_rutas');
        $ruta->costo = request('costo');
        $ruta->estado = request('estado');

        $ruta->save();
        return redirect()->route('rutas')
            ->with('success', 'Ruta actualizada con exito');
    }


    public function destroy($id)
    {

        try {
            Ruta::find($id)->delete();

            return redirect()->route('rutas')
                ->with('success', 'Registro eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect()->route('rutas')
                ->with('success', 'Registro relacionado, imposible de eliminar');
        }
    }
}
