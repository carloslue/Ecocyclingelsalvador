<?php

namespace App\Http\Controllers\administrador;
use App\Models\Ruta;
use App\Models\User;
use App\Models\Promocione;
use App\Models\Reservaspromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservaspromorealizadasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    }
   
    public function index(Request $request)
    {
       
   
        $total=Reservaspromo::where("reservaspromos.estado","=","realizada")->count();
        if($request){
        $query =trim($request->get('buscar'));

        $reservaspromos = DB::table('reservaspromos')
        ->join('users', 'users.id', '=', 'reservaspromos.clienteID')
        ->join('promociones', 'promociones.id', '=', 'reservaspromos.promocionID')
        ->select('reservaspromos.*', 'promociones.rutasID', 'promociones.precio','promociones.cantidad','promociones.precio','promociones.fecha_vigencia','users.name','users.imagen')
     
        ->where("reservaspromos.estado","=",'realizada')
        ->where('fecha_visita','LIKE','%'.$query.'%')
        ->get();
       

        return view('Administrador.reservaspromorealizadas.index', compact('reservaspromos','query','total'))
            ->with('i', (request()->input('page', 1) - 1));
        }
    }

     
    public function show($id)
    { 
        $reservaspromo = DB::table('reservaspromos')
        ->join('users', 'users.id', '=', 'reservaspromos.clienteID')
        ->join('promociones', 'promociones.id', '=', 'reservaspromos.promocionID')
        ->select('reservaspromos.*', 'promociones.rutasID', 'promociones.precio','promociones.cantidad','promociones.precio','promociones.fecha_vigencia','users.name','users.imagen')
        ->where("reservaspromos.id","=",$id)
      
        ->get();
       

        return view('Administrador.venta.show', compact('reservaspromo'));
    }

    
    public function edit($id)
    {
        $reservaspromos = DB::table('reservaspromos')
        ->join('users', 'users.id', '=', 'reservaspromos.clienteID')
        ->join('promociones', 'promociones.id', '=', 'reservaspromos.promocionID')
        ->select('reservaspromos.*', 'promociones.descripcion', 'promociones.precio','promociones.cantidad','promociones.precio','promociones.fecha_vigencia','users.name')
        ->where("reservaspromos.id","=",$id)
      
        ->get();
       
       

        return view('Administrador.venta.formpromo', compact('reservaspromos'));
    }

    
    public function update(Request $request, $id)
    {
        request()->validate(Reservaspromo::$rules);

        $reservaspromo= Reservaspromo::findOrFail($id);
      
        $reservaspromo->fecha_visita = $request->fecha_visita;
        $reservaspromo->hora = $request->hora;
        $reservaspromo->estado = $request->estado;
        $reservaspromo->save();

        return redirect()->route('reservasprom')
            ->with('success', 'Estado Actualizado');
    }


    public function destroy($id)
    {
        $reservaspromo = Reservaspromo::find($id)->delete();

        return redirect()->route('reserproindex')
            ->with('success', 'Reserva promocion eliminada');
    }
}
