<?php

namespace App\Http\Controllers\administrador;

use App\Models\Reserva;
use App\Models\Ruta;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservasrealizadasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('soloadmin', ['only' => ['index']]);
    }

    public function index(Request $request)
    {

        $total = Reserva::where("reservas.estado", "=", "realizada")->count();
        if ($request) {
            $query = trim($request->get('buscar'));
            $reservas = DB::table('reservas')
                ->join('users', 'users.id', '=', 'reservas.clienteID')
                ->join('rutas', 'rutas.id', '=', 'reservas.rutaID')
                ->select('reservas.*', 'rutas.titulo', 'users.name', 'users.imagen')
                ->where("reservas.estado", "=", "realizada")
                ->where('fecha', 'LIKE', '%' . $query . '%')
                ->get();


            return view('Administrador.reservarealizada.index', compact('reservas', 'query', 'total'))
                ->with('i', (request()->input('page', 1) - 1));
        }
    }



    public function show($id)
    {
        $reserva = Reserva::find($id);

        return view('Administrador.reserva.show', compact('reserva'));
    }

    public function edit($id)
    {
        $reservas = DB::table('reservas')
            ->join('users', 'users.id', '=', 'reservas.clienteID')
            ->join('rutas', 'rutas.id', '=', 'reservas.rutaID')
            ->select('reservas.*', 'rutas.titulo', 'rutas.costo', 'users.name', 'users.imagen')
            ->where("reservas.id", "=", $id)

            ->get();


        return view('Administrador.ventascomune.formguardar', compact('reservas'));
    }


    public function update(Request $request, $id)
    {
        request()->validate(Reserva::$rules);

        $reserva = Reserva::findOrFail($id);

        $reserva->fecha = $request->fecha;
        $reserva->telefono = $request->telefono;
        $reserva->hora = $request->hora;
        $reserva->rutaID = $request->rutaID;
        $reserva->clienteID = $request->clienteID;
        $reserva->cantidad = $request->cantidad;
        $reserva->estado = $request->estado;
        $reserva->save();

        return redirect()->route('reservasrealizada')
            ->with('success', 'Estado Actualizado');
    }


    public function destroy($id)
    {
        $reserva = Reserva::find($id)->delete();

        return redirect()->route('reservasrealizada')
            ->with('success', 'Reserva eliminada');
    }
}
