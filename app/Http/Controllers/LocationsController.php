<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Campaign;
use App\Location;

class LocationsController extends Controller
{
    //
    public function showLocations(Campaign $campaign){
        $locations = Location::where("campaign", $campaign->id)->get();

        return view("campaign.Locations", [
            "activeTab" => "locations",
            "campaign" => $campaign,
            "locations" => $locations
        ]);
    }

    public function showCreateLocation(Campaign $campaign){
        return view("locations.new",[
            "campaign" => $campaign
        ]);
    }

    public function createLocation(Request $request, Campaign $campaign){
        $location = new Location;

        $location->campaign = $campaign->id;
        $location->name = $request->input("name");
        $location->content = $request->input("content");
        $location->save();

        return redirect()->route('campaign::locations::view', [$campaign->id, $location->id]);
    }

    public function showEditLocation(Campaign $campaign, Location $location){
        return view("locations.edit", [
            "location" => $location,
            "campaign" => $campaign
        ]);
    }

    public function updateLocation(Request $request, Campaign $campaign, Location $location){
        $name = $request->input("newName");
        $content = $request->input("newContent");

        $location->name = $name;
        $location->content = $content;

        $location->save();

        return redirect()->route('campaign::locations::view', [$campaign->id, $location->id]);
    }

    public function deleteLocation(Campaign $campaign, Location $location){
        $location->delete();

        return redirect()->route("campaign::locations::list", $campaign->id);

    }

    public function showLocation(Campaign $campaign, Location $location){
        return view("locations.view", [
            "location" => $location,
            "campaign" => $campaign
        ]);

    }
}
