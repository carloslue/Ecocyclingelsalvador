<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use Illuminate\Http\Request;


class InformacionController extends Controller
{
   
    public function index()
    {
        
        $informacions = Informacion::paginate();

        return view('usuarioinformacion.index', compact('informacions'))
            ->with('i', (request()->input('page', 1) - 1) * $informacions->perPage());
    }

}
