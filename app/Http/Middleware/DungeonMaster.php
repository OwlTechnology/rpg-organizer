<?php

namespace App\Http\Middleware;
use App\Campaign;
use Illuminate\Support\Facades\Auth;
use Closure;

class DungeonMaster
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

      $campaign = Campaign::find($request->id);

      if($campaign){

        if(Auth::user()->id == $campaign->dm){
          return $next($request);
        }else{
          return response('Unauthorized.', 401);
        }

      }else{
        return response('Unauthorized.', 401);
      }

    }
}
