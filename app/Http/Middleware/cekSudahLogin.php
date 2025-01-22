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

        foreach ($baru as $b) {
            if(Auth::user()->toLa?->role_account == $b){

                if(Auth::user()->toLa?->is_active == false){
                    abort(403, 'Unauthorized access');
                }

                return $next($request);
            }
        }
       abort(403, 'Unauthorized action.');
    }
}

