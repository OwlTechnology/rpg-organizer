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

        // Create new campaign
        $campaign = new Campaign;

        $campaign->name = $name;
        $campaign->dm = Auth::user()->id;

        $campaign->save();

        return redirect("/me");
    }

    public function index($id){

      $campaign = Campaign::find($id);

      return view("campaign.index", [
        "campaign" => $campaign
      ]);
    }


    public function delete($id){
      return json_encode(Campaigns::find($id));
    }


}
