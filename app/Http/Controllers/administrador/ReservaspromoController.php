<?php

namespace App\Http\Controllers\administrador;
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
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    }
   
    public function index(Request $request)
    {
        $total=Reservaspromo::count();
        if($request){
        $query =trim($request->get('buscar'));
        $reservaspromos = DB::table('reservaspromos')
        ->join('users', 'users.id', '=', 'reservaspromos.clienteID')
        ->join('promociones', 'promociones.id', '=', 'reservaspromos.promocionID')
        ->select('reservaspromos.*', 'promociones.rutasID','promociones.cantidad','promociones.precio','promociones.fecha_vigencia','users.name','users.imagen')
        ->where('fecha_visita','LIKE','%'.$query.'%')
        ->get();

        return view('Administrador.reservaspromo.index', compact('reservaspromos','query','total'))
            ->with('i', (request()->input('page', 1) - 1));
        }
    }

    
   
    
    public function show($id)
    {
        $reservaspromo = Reservaspromo::find($id);

        return view('Administrador.reservaspromo.show', compact('reservaspromo'));
    }

 
   
    public function destroy($id)
    {
        $reservaspromo = Reservaspromo::find($id)->delete();

        return redirect()->route('reservaspromos.index')
            ->with('success', 'Reserva promocion eliminada');
    }
}
