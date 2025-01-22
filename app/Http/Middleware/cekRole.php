<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        if($guard == null){
            abort(403, 'Unauthorized action.');
        }
        else{
            if(Auth::guard($guard)->check()){
                return $next($request);
            }
            else{
                abort(403, 'Unauthorized action.');
            }
        }
    }
}
