<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Invite;
use App\User;

abstract class InviteType{
    const Campaign = 0;
}

class InviteController extends Controller{

    protected function create($userID, $targetUserID, $inviteType, $targetObjectID){
        $invite = new Invite;

        $invite->FK_userSentFrom = $userID;
        $invite->FK_userSentTo = $targetUserID;
        $invite->inviteType = $inviteType;
        $invite->FK_targetObject = $targetObjectID;

        $invite->save();
    }

    public function createCampaignInvite(Request $request){
        $campaignID = $request->input("campaignID");
        $username = strtolower($request->input("username"));

        // first, try to find the user in question
        $possibleUsers = User::where("name", $username)->get();
        $user = null;

        if(count($possibleUsers) < 1){
            return redirect("/campaign/" . $campaignID)->with([
                "invite.error" => true,
                "invite.error.msg" => "No users match the specified username!"
            ]);
        }

        $user = $possibleUsers[0];

        // create new invite
        $this->create(Auth::user()->id, $user->id, InviteType::Campaign, $campaignID);

        // go back to campaign screen, and let them know it worked
        return redirect("/campaign/" . $campaignID)->with([
            "invite.message" => "Invite to " . $username . " sent successfully!"
        ]);
    }

    public function getInvitesForCurrentUser(){
        $userID = Auth::user()->id;

        $invites = Invite::where("FK_userSentTo", $userID)->get();

        return response()->json($invites);
    }

}
