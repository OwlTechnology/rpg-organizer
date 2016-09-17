<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Campaign;
class CampaignsController extends Controller
{
    public function create(Request $request){
        $name = $request->input("campaignName");
        $campaign = new Campaign;
        $campaign->name = $name;
        $campaign->dm = Auth::user()->id;
        $campaign->save();
        return redirect("/me");
    }


}
