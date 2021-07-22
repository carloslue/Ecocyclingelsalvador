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
        ->leftjoin('users', 'users.id', '=', 'reservaspromos.clienteID')
        ->leftjoin('promociones', 'promociones.id', '=', 'reservaspromos.promocionID')
        ->select('reservaspromos.*', 'promociones.rutasID','promociones.cantidad','promociones.precio','promociones.fecha_vigencia','users.name','users.imagen')
        ->where('fecha_visita','LIKE','%'.$query.'%')
        ->get();

        return view('Administrador.reservaspromo.index', compact('reservaspromos','query','total'))
            ->with('i', (request()->input('page', 1) - 1));
        }
    }

    
    public function edit($id)
    {
        $reservaspromo = Reservaspromo::find($id);

        return view('Administrador.reservaspromo.edit', compact('reservaspromo'));
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

        return redirect()->route('reservaspromos.index')
            ->with('success', 'Reserva promocion eliminada');
    }
}
