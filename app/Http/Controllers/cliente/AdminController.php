<?php

namespace App\Http\Controllers\administrador;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
        $this->middleware('soloadmin',['only'=> ['index']]);
    }
   
    public function index(Request $request)
    {

       
            if($request){
                $query =trim($request->get('buscar'));
            $users = User::where('rol','=','','and','name','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->get();

        return view('Administrador.user.index', compact('users','query'))
            ->with('i', (request()->input('page', 1) - 1) );

            }
    }

    public function Admin(Request $request)
    {

       
            if($request){
            $query =trim($request->get('buscar'));
            $users = User::where('rol','=','administrador','and','name','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->get();

        return view('Administrador.user.admin', compact('users','query'))
            ->with('i', (request()->input('page', 1) - 1) );

            }
    }
    

  
    public function show($id)
    {
        $user = User::find($id);

        return view('Administrador.user.show', compact('user'));
    }

    
    public function edit($id)
    {
        $user = User::find($id);

        return view('Administrador.user.edit', compact('user'));
    }

    
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('cliente')
            ->with('success', 'Usuario actualizado con exito');
    }

    
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado ');
    }
}
