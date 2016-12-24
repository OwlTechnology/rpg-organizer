<?php

namespace App\Http\Middleware;

use Closure;

class IsStaticManager
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
        if(\Auth::user()->account_type == 2){
            return $next($request);
        }else{
            return response('Unauthorized.', 401);
        }
    }
}
