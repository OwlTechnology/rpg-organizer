<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Campaign;
use App\Location;

class LocationsController extends Controller
{
    //
    public function showLocations($campaignID){
        $campaign = Campaign::find($campaignID);
        $locations = Location::where("campaign", $campaignID)->get();

        return view("campaign.Locations", [
            "activeTab" => "locations",
            "campaign" => $campaign,
            "locations" => $locations
        ]);
    }

    public function showCreateLocation($campaignID){
        $campaign = Campaign::find($campaignID);

        return view("locations.new",[
            "campaign" => $campaign
        ]);
    }

    public function createLocation(Request $request, $campaignID){
        $campaign = Campaign::find($campaignID);

        $location = new Location;

        $location->campaign = $campaignID;
        $location->name = $request->input("name");
        $location->content = $request->input("content");
        $location->save();

        return redirect('/campaign/' . $campaignID . '/location/' . $location->id);

    }
    public function showLocation($campaignID, $locationID){
        $location = Location::find($locationID);
        $campaign = Campaign::find($campaignID);

        return view("locations.view", [
            "location" => $location,
            "campaign" => $campaign
        ]);

    }
}
