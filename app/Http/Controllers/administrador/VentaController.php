<?php

namespace App\Http\Controllers\administrador;

use App\Models\Venta;
use App\Models\Ruta;
use App\Models\User;
use App\Models\Promocione;
use Illuminate\Http\Request;

/**
 * Class VentaController
 * @package App\Http\Controllers
 */
class VentaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('soloadmin', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $inicio = request('inicio');
        $final = request('final');

        if ($inicio > $final) {
            return redirect()->route('ventas.index')
                ->with('danger', 'LA FECHA INICIAL TIENE QUE SER MENOR A LA FECHA FINAL');
        } elseif ($inicio < $final) {
            $totalc = venta::whereBetween('fecha', [$inicio, $final])->count();
            $ventapromocion = Venta::whereBetween('fecha', [$inicio, $final])->sum('precio');
            $iva = ($ventapromocion / 1.13);
            $libre = ($ventapromocion - $iva);

            $ventas = Venta::whereBetween('fecha', [$inicio, $final])->paginate();
            return view('Administrador.venta.index', compact('iva', 'libre', 'ventas', 'totalc', 'ventapromocion'))
                ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());
        } else {
            $totalc = Venta::count();
            $ventapromocion = Venta::sum('precio');

            $iva = ($ventapromocion / 1.13);

            $libre = ($ventapromocion - $iva);

            $ventas = Venta::paginate();
            return view('Administrador.venta.index', compact('iva', 'libre', 'ventas', 'totalc', 'ventapromocion'))
                ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());
        }


        // $ventas = Venta::paginate();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venta = new Venta();
        return view('Administrador.venta.create', compact('venta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Venta::$rules);

        $venta = Venta::create($request->all());

        return redirect()->route('ventas.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::find($id);

        return view('Administrador.venta.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::find($id);

        return view('Administrador.venta.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        request()->validate(Venta::$rules);

        $venta->update($request->all());

        return redirect()->route('ventas.index')
            ->with('success', 'Registro actualizado exitosamnete');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $venta = Venta::find($id)->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Registro eliminado con exito');
    }
}
