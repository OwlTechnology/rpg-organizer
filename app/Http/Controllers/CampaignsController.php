<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Campaign;
use App\Note;

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
      $notes = Note::where("campaign", $campaign->id)->get();

      return view("campaign.index", [
        "campaign" => $campaign,
        "notes" => $notes,
        "activeTab" => "home"
      ]);
    }

    public function notes($id){
        $campaign = Campaign::find($id);
        $notes = Note::where("campaign", $campaign->id)->get();

        return view("campaign.notes", [
          "campaign" => $campaign,
          "notes" => $notes,
          "activeTab" => "notes"
        ]);
    }


    public function delete(Request $request){
      Campaign::find($request->id)->delete();
      return redirect("/me");
    }

    public function update(Request $request){

      $campaign = Campaign::find($request->id);

      $campaign->name = $request->input("name");
      $campaign->save();

      return redirect('/me');
    }


}
