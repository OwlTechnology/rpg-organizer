<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Npc;
use App\Campaign;
use App\Location;

class NpcsController extends Controller
{
    public function npcs(Campaign $campaign){
        $npcs = Npc::where("campaign_id", "=", $campaign->id)->get();

        return view("campaign.npcs", [
            "campaign" => $campaign,
            "activeTab" => "npcs",
            "npcs" => $npcs
        ]);
    }

    public function createPage(Request $request, Campaign $campaign){
        // get all locations in this campaign, so that we can list them
        // for the user as possible places for the NPC to be
        $locations = Location::where("campaign", $campaign->id)->get();

        return view("npcs.create")->with([
            "campaign" => $campaign,
            "locations" => $locations
        ]);
    }

    public function create(Request $request, Campaign $campaign){
        $locationID = $request->input("location_id");
        $location = Location::find($locationID);

        if(!$location && $locationID != 0){
            return redirect("/campaigns/" + $campaignID + "/npcs/new")->with([
                "success" => false,
                "message" => "Cannot find the specified location."
            ]);
        }

        // if we got here, we're good; create the NPC
        $newNpc = new Npc;

        $newNpc->name = $request->input("name");
        $newNpc->short_description = $request->input("short_description");
        $newNpc->location_id = $locationID;
        $newNpc->campaign_id = $campaign->id;

        $newNpc->save();

        return redirect()->route('campaign::npcs::list', $campaign->id);
    }

    public function view(Request $request, Campaign $campaign, Npc $npc){
        // check to make sure the NPC is in the right campaign
        if($npc->campaign_id != $campaign->id){
            abort(404);
        }

        return view("npcs.view")->with([
            "campaign" => $campaign,
            "npc" => $npc
        ]);
    }

    public function update(Request $request, Campaign $campaign, Npc $npc){
        if($npc->campaign_id != $campaign->id){
            abort(404);
        }

        $npc->name = $request->input("name");
        $npc->short_description = $request->input("short_description");

        $npc->save();
        
        return redirect()->route('campaign::npcs::view', [$campaign->id, $npc->id]);
    }

    public function editView(Request $request, Campaign $campaign, Npc $npc){
        // make sure that this NPC is in the campaign
        if($npc->campaign_id != $campaign->id){
            abort(404);
        }

        return view("npcs.edit")->with([
            "campaign" => $campaign,
            "npc" => $npc
        ]);
    }
}
