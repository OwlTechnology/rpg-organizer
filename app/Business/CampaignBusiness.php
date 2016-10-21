<?php

namespace App\Business;

use App\Http\Requests;
use App\Invite;
use App\User;
use App\Campaign;
use App\PlayerInCampaign;

use App\Utility\InviteType;

use Illuminate\Support\Facades\Auth;

class CampaignBusiness{

    public function kickPlayer($playerID, $campaignID){
        // Make sure the player attempting to perform this action
        // is the owner of the campaign
        $campaign = Campaign::find($campaignID);

        if($campaign->dm != Auth::user()->id){
            return false;
        }

        // Get the association; we just delete this to remove them from the
        // campaign.
        $association = PlayerInCampaign::where("FK_user", $playerID)->where("FK_campaign", $campaignID)->get()[0];

        $association->delete();

        return true;
    }

}
