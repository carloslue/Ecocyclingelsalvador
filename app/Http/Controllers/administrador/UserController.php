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
         $total= User::count();
       
            if($request){
                $query =trim($request->get('buscar'));
            $users = User::where('name','LIKE','%'.$query.'%')
            
            ->get();

        return view('Administrador.user.index', compact('users','query','total'))
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


        try {
            User::find($id)->delete();
           
            return redirect()->route('cliente')
            ->with('success','Registro eliminado correctamente');
            } catch (\Illuminate\Database\QueryException $e) {
               
                return redirect()->route('cliente')
                ->with('success','Registro relacionado, imposible de eliminar');
            }  
      
    }
}
