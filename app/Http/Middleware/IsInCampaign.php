<?php

namespace App\Http\Middleware;

use Closure;
use App\Campaign;
use App\PlayerInCampaign;

use Illuminate\Support\Facades\Auth;

class IsInCampaign
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
        $campaignID = $request->id;
        $campaign = Campaign::find($campaignID);

        if($campaign){
            $isGM = $campaign->dm == Auth::user()->id;
            $isInCampaign = PlayerInCampaign::where([
                ["FK_campaign", "=", $campaign->id],
                ["FK_user", "=", Auth::user()->id]
            ])->count() > 0;

            if(!($isGM || $isInCampaign)){
                return redirect("/me");
            }
        }else{
            return redirect("/me");
        }

        return $next($request);
    }
}
