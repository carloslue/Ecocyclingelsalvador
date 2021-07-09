<?php

namespace App\Http\Controllers\cliente;

use App\Models\Reserva;
use App\Models\Ruta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('solouser',['only'=> ['index']]);
    }
   
    public function index()
    {
        $reservas = DB::table('reservas')
            ->join('users', 'users.id', '=', 'reservas.clienteID')
            ->join('rutas', 'rutas.id', '=', 'reservas.rutaID')
            ->select('reservas.*', 'rutas.titulo','users.name')
            ->where('clienteID',auth()->id())
            ->get();
    

        return view('cliente.usuarioreserva.index', compact('reservas'))
            ->with('i', (request()->input('page', 1) - 1));
    }

   
    public function create()
    {
        $rutas=Ruta::all();
        $users=User::all();
        $reserva = new Reserva();
        return view('cliente.usuarioreserva.create', compact('reserva','rutas','users'));
    }

   
    public function store(Request $request)
    {
        request()->validate(Reserva::$rules);

       // $reserva = Reserva::create($request->all());
       $reserva = new Reserva();
       $reserva->clienteID =auth()->id();
       $reserva->rutaID = request('rutaID');
       $reserva->fecha = request('fecha');
       $reserva->hora = request('hora');
       $reserva->cantidad = request('cantidad');
       $reserva->telefono = request('telefono');
       $reserva->save();

        return redirect()->route('reservaindex')
            ->with('success', 'Reserva creado con exito');
    }

   
    public function show($id)
    {
        $reserva = Reserva::find($id);

        return view('cliente.usuarioreserva.show', compact('reserva'));
    }

   
    public function edit($id)
    {
        $rutas=Ruta::all();
        $user=User::all();
        $reserva = Reserva::find($id);

        return view('cliente.usuarioreserva.edit', compact('reserva','rutas','user'));
    }

   
    public function update(Request $request, Reserva $reserva)
    {
        request()->validate(Reserva::$rules);

        $reserva->update($request->all());
       /* $reserva->update ($request->auth()->id());*/
        

        return redirect()->route('reservaindex')
            ->with('success', 'Reserva actualizado exitosamente');
    }

   
    public function destroy($id)
    {
        $reserva = Reserva::find($id)->delete();

        return redirect()->route('reservaindex')
            ->with('success', 'Reserva eliminada');
    }
}
