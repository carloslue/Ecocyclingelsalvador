<?php

namespace App\Http\Controllers\administrador;

use App\Models\Comentario;
use Illuminate\Http\Request;


class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    } 


    public function index()
    {
        $comentarios = Comentario::paginate();
        //codigo para ver el total de  registros que tenemos en la tabla//
        
        $total= Comentario::count();
       

        return view('Administrador.comentario.index', compact('comentarios','total'))
            ->with('i', (request()->input('page', 1) - 1) * $comentarios->perPage());
    }

  
    public function show($id)
    {
        $comentario = Comentario::find($id);

        return view('Administrador.comentario.show', compact('comentario'));
    }

    
  
    public function destroy($id)
    {
        $comentario = Comentario::find($id)->delete();

        return redirect()->route('comentarios')
            ->with('success', 'Comentario eliminado');
    }
}
