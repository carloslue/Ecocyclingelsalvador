<?php

namespace App\Http\Controllers\administrador;

use App\Models\Ventascomune;
use Illuminate\Http\Request;

/**
 * Class VentascomuneController
 * @package App\Http\Controllers
 */
class VentascomuneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inicio=request('inicio');
        $final=request('final');

        if ($inicio>$final) {
            return redirect()->route('ventacomun')
            ->with('danger', 'LA FECHA INICIAL TIENE QUE SER MENOR A LA FECHA FINAL');
        } elseif($inicio<$final) {
            $totalc=Ventascomune::whereBetween('fecha', [$inicio, $final])->count();
            $ventacomun = Ventascomune::whereBetween('fecha', [$inicio, $final])->sum('precio');
            $iva=($ventacomun/1.13);
            $libre=($ventacomun-$iva);

            $ventascomunes = Ventascomune::whereBetween('fecha', [$inicio, $final])->paginate();
            return view('Administrador.ventascomune.index', compact('iva','libre','totalc','ventacomun','ventascomunes'))
            ->with('i', (request()->input('page', 1) - 1) * $ventascomunes->perPage());
        }
        else {
            $totalc=Ventascomune::count();
           
            $ventacomun = Ventascomune::sum('precio');

            $iva=($ventacomun/1.13);

            $libre=($ventacomun-$iva);

            $ventascomunes = Ventascomune::paginate();
            return view('Administrador.ventascomune.index', compact('libre','iva','totalc','ventacomun','ventascomunes'))
            ->with('i', (request()->input('page', 1) - 1) * $ventascomunes->perPage());
        }

       // $ventapromocion = Ventascomune::sum('precio');

       // return view('Administrador.ventascomune.index', compact('totalc','ventapromocion','ventascomunes'))
          //  ->with('i', (request()->input('page', 1) - 1) * $ventascomunes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ventascomune = new Ventascomune();
        return view('Administrador.ventascomune.create', compact('ventascomune'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ventascomune::$rules);

        $ventascomune = Ventascomune::create($request->all());

        return redirect()->route('ventacomun')
            ->with('success', 'Registro creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ventascomune = Ventascomune::find($id);

        return view('Administrador.ventascomune.show', compact('ventascomune'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventascomune = Ventascomune::find($id);

        return view('Administrador.ventascomune.edit', compact('ventascomune'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ventascomune $ventascomune
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Ventascomune::$rules);
       
        $ventascomune= Ventascomune::findOrFail($id);
       
        $ventascomune->factura = $request->factura;
        $ventascomune->nombre = $request->nombre;
        $ventascomune->ruta = $request->ruta;
        $ventascomune->precio = $request->precio;
        $ventascomune->fecha = $request->fecha;
        $ventascomune->save();


      


        return redirect()->route('ventacomun')
            ->with('success', 'Registro actualizado con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ventascomune = Ventascomune::find($id)->delete();

        return redirect()->route('ventacomun')
            ->with('success', 'Registro eliminado con exito');
    }
}
