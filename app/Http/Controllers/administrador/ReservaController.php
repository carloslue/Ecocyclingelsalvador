<?php

namespace App\Http\Controllers\administrador;

use App\Models\Reserva;
use App\Models\Ruta;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    }
 
    public function index(Request $request)
    {

        $total=Reserva::count();
        if($request){
            $query =trim($request->get('buscar'));
            $reservas = DB::table('reservas')
            ->join('users', 'users.id', '=', 'reservas.clienteID')
            ->join('rutas', 'rutas.id', '=', 'reservas.rutaID')
            ->select('reservas.*', 'rutas.titulo','users.name','users.imagen')
            ->where('fecha','LIKE','%'.$query.'%')
            ->get();
    

        return view('Administrador.reserva.index', compact('reservas','query','total'))
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
        $reserva = Reserva::find($id);

        return view('Administrador.reserva.edit', compact('reserva'));
    }

    
    public function update(Request $request, $id)
    {
        request()->validate(Reserva::$rules);

        $reserva= Reserva::findOrFail($id);
       
        $reserva->fecha = $request->fecha;
        $reserva->telefono = $request->telefono;
        $reserva->hora = $request->hora;
        $reserva->rutaID = $request->rutaID;
        $reserva->clienteID = $request->clienteID;
        $reserva->cantidad = $request->cantidad;
        $reserva->estado = $request->estado;
        $reserva->save();

        return redirect()->route('reservas')
            ->with('success', 'Estado Actualizado');
    }


    public function destroy($id)
    {
        $reserva = Reserva::find($id)->delete();

        return redirect()->route('reservas')
            ->with('success', 'Reserva eliminada');
    }
}
