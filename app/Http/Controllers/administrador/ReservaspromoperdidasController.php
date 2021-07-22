<?php

namespace App\Http\Controllers\administrador;
use App\Models\Ruta;
use App\Models\User;
use App\Models\Promocione;
use App\Models\Reservaspromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservaspromoperdidasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    }
   
    public function index(Request $request)
    {
        $totalc=Reservaspromo::where("reservaspromos.estado","=","cancelado")->count();
        $total=Reservaspromo::where("reservaspromos.estado","=","perdida")->count();
  //consulta para extraer los datos de las reservas perdidas
        $reservaspromos = DB::table('reservaspromos')
        ->leftjoin('users', 'users.id', '=', 'reservaspromos.clienteID')
        ->leftjoin('promociones', 'promociones.id', '=', 'reservaspromos.promocionID')
        ->select('reservaspromos.*', 'promociones.rutasID','promociones.cantidad','promociones.precio','promociones.fecha_vigencia','users.name','users.imagen')
        ->where("reservaspromos.estado","=","perdida")
       
        ->get();

        //consulta para extraer los datos de las reservas canceladas
        $reservaspromoperdidas = DB::table('reservaspromos')
        ->join('users', 'users.id', '=', 'reservaspromos.clienteID')
        ->join('promociones', 'promociones.id', '=', 'reservaspromos.promocionID')
        ->select('reservaspromos.*', 'promociones.rutasID','promociones.cantidad','promociones.precio','promociones.fecha_vigencia','users.name','users.imagen')
        ->where("reservaspromos.estado","=","cancelado")
        ->get();

        return view('Administrador.reservaspromoperdidas.index', compact('reservaspromoperdidas','reservaspromos','total','totalc'))
            ->with('i', (request()->input('page', 1) - 1));
    
    }


    public function destroy($id)
    {
        $reservaspromo = Reservaspromo::find($id)->delete();

        return redirect()->route('reservapromoperdidaindex')
            ->with('success', 'Reserva promocion eliminada');
    }
}
