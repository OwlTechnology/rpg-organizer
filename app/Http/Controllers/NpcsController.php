<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Npc;
use App\Campaign;
use App\Location;

class NpcsController extends Controller
{
    public function npcs($campaignID){
        $campaign = Campaign::find($campaignID);
        $npcs = Npc::where("campaign_id", "=", $campaignID)->get();

        return view("campaign.npcs", [
            "campaign" => $campaign,
            "activeTab" => "npcs",
            "npcs" => $npcs
        ]);
    }

    public function createPage(Request $request, $campaignID){
        $campaign = Campaign::find($campaignID);
        $locations = Location::where("campaign", $campaign->id)->get();

        return view("npcs.create")->with([
            "campaign" => $campaign,
            "locations" => $locations
        ]);
    }

    public function create(Request $request, $campaignID){
        $locationID = $request->input("location_id");
        $location = Location::find($locationID);

        if(!$location){
            return redirect("/campaigns/" + $campaignID + "/npcs/new")->with([
                "success" => false,
                "message" => "Cannot find the specified location."
            ]);
        }

        // if we got here, we're good; create the NPC
        $newNpc = new Npc;

        $newNpc->name = $request->input("name");
        $newNpc->short_description = $request->input("short_description");
        $newNpc->location_id = $location->id;
        $newNpc->campaign_id = $campaignID;

        $newNpc->save();

        return redirect('/campaign/' . $campaignID . '/npcs/');
    }

    public function view(Request $request, $campaignID, $npcID){
        $campaign = Campaign::find($campaignID);
        $npc = Npc::find($npcID);

        if(!$campaign || !$npc || $npc->campaign_id != $campaign->id){
            return response(404);
        }

        return view("npcs.view")->with([
            "campaign" => $campaign,
            "npc" => $npc
        ]);
    }
}
