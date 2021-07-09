<?php

namespace App\Http\Controllers\cliente;

use App\Models\Comentario;
use Illuminate\Http\Request;


class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('solouser',['only'=> ['index']]);
    }
   
    public function index()
    {
        $comentarios = Comentario::paginate();

        return view('cliente.usuariocomentario.index', compact('comentarios'))
            ->with('i', (request()->input('page', 1) - 1) * $comentarios->perPage());
    }

    public function create()
    {
        $comentario = new Comentario();
        return view('cliente.usuariocomentario.create', compact('comentario'));
    }

  
    public function store(Request $request)
    {
        request()->validate(Comentario::$rules);

        $comentario = Comentario::create($request->all());

        return redirect()->route('users')
            ->with('success', 'Comentario enviado.');
    }

   

    
}
