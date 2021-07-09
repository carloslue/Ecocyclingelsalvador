<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        switch(auth::user()->rol){
            case ('administrador'):
                return $next($request);//si es administrador continua al HOME
            break;
                
            case (''):
                return redirect('users');//si es administrador redirige al moderador
            break;
        }
    }
}
