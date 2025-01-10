<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

class cekSudahLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$baru) : Response
    {
        if (Auth::guest()) {
            Log::info('User not authenticated. Redirecting to login.');
            return redirect(url('form/login'));
        }
        $cek = false;
        foreach ($baru as $b) {
            //dd(Auth::user()->toLa->role_account);
            if(Auth::user()->toLa?->role_account == $b){
                return $next($request);
            }
            else{
                $cek = true;
            }
        }
        if($cek){
            abort(403, 'Unauthorized access.');
        }
       abort(403, 'Unauthorized action.');
    }
}

