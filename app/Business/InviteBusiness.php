<?php

namespace App\Business;

use App\Http\Requests;
use App\Invite;
use App\User;
use App\Campaign;
use App\PlayerInCampaign;

use App\Utility\InviteType;

use Illuminate\Support\Facades\Auth;

class InviteBusiness{

    public function acceptInvite($inviteID){
        $invite = Invite::find($inviteID);

        if(!$invite){
            return false;
        }

        if($invite->FK_userSentTo != Auth::user()->id){
            return false;
        }

        $association = new PlayerInCampaign;

        $association->FK_user = Auth::user()->id;
        $association->FK_campaign = $invite->FK_targetObject;

        $association->save();

        $invite->delete();

        return true;
    }

}
