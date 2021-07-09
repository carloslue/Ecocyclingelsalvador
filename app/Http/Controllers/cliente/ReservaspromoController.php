<?php

namespace App\Http\Controllers\cliente;
use App\Models\Ruta;
use App\Models\User;
use App\Models\Promocione;
use App\Models\Reservaspromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservaspromoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('solouser',['only'=> ['index']]);
    }


    public function index()
    {

        $reservaspromos = DB::table('reservaspromos')
        ->join('users', 'users.id', '=', 'reservaspromos.clienteID')
        ->join('promociones', 'promociones.id', '=', 'reservaspromos.promocionID')
        ->select('reservaspromos.*', 'promociones.rutasID','promociones.cantidad','promociones.precio','promociones.fecha_vigencia','users.name')
        ->where('clienteID',auth()->id())
        ->get();
       // $reservaspromos = Reservaspromo::paginate();

        return view('cliente.reservaspromo.index', compact('reservaspromos'))
            ->with('i', (request()->input('page', 1) - 1));
    }

   
    public function create()
    {
        $users=User::all();
        $promocions=Promocione::all();
        $promocione = new Reservaspromo();
        return view('cliente.reservaspromo.create', compact('promocione'));
    }

    
    public function store(Request $request)
    {
        request()->validate(Reservaspromo::$rules);
        $promocione = new Reservaspromo();
        $promocione->clienteID =auth()->id();
        $promocione->promocionID = request('promocionID');
        $promocione->fecha_visita = request('fecha_visita');
        $promocione->hora = request('hora');
        $promocione->save();

        //$reservaspromo = Reservaspromo::create($request->all());

        return redirect()->route('reservasp')
            ->with('success', 'Reserva creada con exito');
    }

   
    public function show($id)
    {
        $reservaspromo = Reservaspromo::find($id);

        return view('cliente.reservaspromo.show', compact('reservaspromo'));
    }

   
    public function edit($id)
    {
        $reservaspromo = Reservaspromo::find($id);

        return view('cliente.reservaspromo.edit', compact('reservaspromo'));
    }

    
    public function update(Request $request, Reservaspromo $reservaspromo)
    {
        request()->validate(Reservaspromo::$rules);

        $reservaspromo->update($request->all());

        return redirect()->route('reservasp')
            ->with('success', 'Reserva actualizada');
    }

    
    public function destroy($id)
    {
        $reservaspromo = Reservaspromo::find($id)->delete();

        return redirect()->route('reservasp')
            ->with('success', 'Reserva eliminada');
    }
}
