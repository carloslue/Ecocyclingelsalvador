<?php

namespace App\Http\Controllers\administrador;

use App\Models\Ventasfinale;
use Illuminate\Http\Request;

/**
 * Class VentasfinaleController
 * @package App\Http\Controllers
 */
class VentasfinaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //codigo para obtener el total de registros de la tabla//
        $total=Ventasfinale::count();
        $ventasfinales = Ventasfinale::paginate();

        return view('Administrador.ventasfinale.index', compact('ventasfinales','total'))
            ->with('i', (request()->input('page', 1) - 1) * $ventasfinales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ventasfinale = new Ventasfinale();
        return view('Administrador.ventasfinale.create', compact('ventasfinale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ventasfinale::$rules);

        /*$ventasfinale = Ventasfinale::create($request->all());*/
        $ventasfinale= new Ventasfinale();

        $uno=request('ventas_internas_exentas');
        $dos=request('ventas_internas_locales');
        $suma=($uno+$dos);
        
        $ventasfinale->dia = request('dia');
        $ventasfinale->n_factura_inicio = request('n_factura_inicio');
        $ventasfinale->n_factura_final = request('n_factura_final');
        $ventasfinale->n_caja = request('n_caja');
        $ventasfinale->ventas_internas_exentas = request('ventas_internas_exentas');
        $ventasfinale->ventas_internas_locales = request('ventas_internas_locales');
        $ventasfinale->exportaciones = request('exportaciones');
        $ventasfinale->total_ventas =($suma);
        $ventasfinale->ventas_a_cuenta_terceros = request('ventas_a_cuenta_terceros');
        $ventasfinale->iva_retenido = request('iva_retenido');
        $ventasfinale->iva_percibido = request('iva_percibido');
        $ventasfinale->save();


        return redirect()->route('ventaindex')
            ->with('success', 'Registro agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ventasfinale = Ventasfinale::find($id);

        return view('Administrador.ventasfinale.show', compact('ventasfinale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventasfinale = Ventasfinale::find($id);

        return view('Administrador.ventasfinale.edit', compact('ventasfinale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ventasfinale $ventasfinale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ventasfinale $ventasfinale)
    {
        request()->validate(Ventasfinale::$rules);

        $ventasfinale->update($request->all());

        $uno=request('ventas_internas_exentas');
        $dos=request('ventas_internas_locales');
        $suma=($uno+$dos);
        
        $ventasfinale->dia = request('dia');
        $ventasfinale->n_factura_inicio = request('n_factura_inicio');
        $ventasfinale->n_factura_final = request('n_factura_final');
        $ventasfinale->n_caja = request('n_caja');
        $ventasfinale->ventas_internas_exentas = request('ventas_internas_exentas');
        $ventasfinale->ventas_internas_locales = request('ventas_internas_locales');
        $ventasfinale->exportaciones = request('exportaciones');
        $ventasfinale->total_ventas =($suma);
        $ventasfinale->ventas_a_cuenta_terceros = request('ventas_a_cuenta_terceros');
        $ventasfinale->iva_retenido = request('iva_retenido');
        $ventasfinale->iva_percibido = request('iva_percibido');
        $ventasfinale->save();
        return redirect()->route('ventaindex')
            ->with('success', 'venta final Actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ventasfinale = Ventasfinale::find($id)->delete();

        return redirect()->route('ventaindex')
            ->with('success', 'Registro eliminado');
    }
}
