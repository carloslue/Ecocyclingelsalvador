<?php

namespace App\Http\Controllers\administrador;
use App\Models\Ruta;
use App\Models\User;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservasperdidasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    }
   
    public function index(Request $request)
    {
        $totalc=Reserva::where("reservas.estado","=","cancelado")->count();
        $total=Reserva::where("reservas.estado","=","perdida")->count();
  //consulta para extraer los datos de las reservas perdidas
        $reservasperdidas = DB::table('reservas')
        ->leftjoin('users', 'users.id', '=', 'reservas.clienteID')
        ->leftjoin('rutas', 'rutas.id', '=', 'reservas.rutaID')
        ->select('reservas.*','rutas.titulo','users.name','users.imagen')
        ->where("reservas.estado","=","perdida")
       
        ->get();

        //consulta para extraer los datos de las reservas canceladas
        $reservascanceladas = DB::table('reservas')
        ->leftjoin('users', 'users.id', '=', 'reservas.clienteID')
        ->leftjoin('rutas', 'rutas.id', '=', 'reservas.rutaID')
        ->select('reservas.*','rutas.titulo','users.name','users.imagen')
        ->where("reservas.estado","=","cancelado")
       
        ->get();

        return view('Administrador.reservasperdidas.index', compact('reservascanceladas','reservasperdidas','total','totalc'))
            ->with('i', (request()->input('page', 1) - 1));
    
    }


    public function destroy($id)
    {
        $reservasperdidas = Reserva::find($id)->delete();

        return redirect()->route('reservasperdida')
            ->with('success', 'Reserva promocion eliminada');
    }
}
