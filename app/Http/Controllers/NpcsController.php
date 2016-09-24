<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Campaign;

class NpcsController extends Controller
{
    public function npcs($campaignID){
        $campaign = Campaign::find($campaignID);

        return view("campaign.npcs", [
            "campaign" => $campaign,
            "activeTab" => "npcs"
        ]);
    }
}
