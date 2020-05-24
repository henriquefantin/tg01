<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerificaAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->admin()){
            session([
                'mensagem' => 'Você não tem permissão para isso'
            ]);
            return back();
        }
        return $next($request);
    }
}
