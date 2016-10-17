<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Invite;
use App\User;
use App\Campaign;
use App\PlayerInCampaign;

use App\Utility\InviteType;

use App\Business\InviteBusiness;

class InviteController extends Controller{

    protected $_invites;

    public function __construct(InviteBusiness $business){
        $this->_invites = $business;
    }

    protected function create($userID, $targetUserID, $inviteType, $targetObjectID){
        $invite = new Invite;

        $invite->FK_userSentFrom = $userID;
        $invite->FK_userSentTo = $targetUserID;
        $invite->inviteType = $inviteType;
        $invite->FK_targetObject = $targetObjectID;

        $invite->save();
    }

    public function acceptInvite(Request $request, $inviteID){
        $this->_invites->acceptInvite($inviteID);

        return redirect("/me");
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

        // Make sure the user isn't already in the campaign
        if(PlayerInCampaign::where("FK_user", $user->id)->count() > 0){
            return redirect("/campaign/" . $campaignID)->with([
                "invite.error" => true,
                "invite.error.msg" => "That user is already in this campaign!"
            ]);
        }

        // create new invite
        $this->create(Auth::user()->id, $user->id, InviteType::Campaign, $campaignID);

        // go back to campaign screen, and let them know it worked
        return redirect("/campaign/" . $campaignID)->with([
            "invite.message" => "Invite to " . $username . " sent successfully!"
        ]);
    }

    public function getInvitesForCurrentUser(){
        $output = [];
        $userID = Auth::user()->id;

        $invites = Invite::where("FK_userSentTo", $userID)->get();

        foreach($invites as $invite){
            $newObject = [];

            switch($invite->inviteType){
                case InviteType::Campaign:
                    $campaign = Campaign::find($invite->FK_targetObject);

                    $newObject["targetObject"] = $campaign;
                    $newObject["message"] = "You have been invited by " . $invite->playerFrom->name .
                        " to their campaign, '" . $campaign->name . "'.";
                    break;
                default:
                    $newObject["message"] = "";
                    break;
            }

            array_push($output, $newObject);
        }

        return response()->json($output);
    }

}
