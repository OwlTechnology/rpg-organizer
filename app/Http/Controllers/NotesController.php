<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Campaign;
use App\Http\Requests;

class NotesController extends Controller
{
    public function showCreateNote($campaignID){
        return view("notes.new", [
            "campaignID" => $campaignID
        ]);
    }

    public function createNote(Request $request){
        $name = $request->input("name");
        $description = $request->input("description");
        $campaignID = $request->input("_campaign_id");

        // Find associated campaign
        $campaign = Campaign::find($campaignID);

        if($campaign){
            // create note
            $note = new Note;

            $note->name = $name;
            $note->description = $description;
            $note->campaign = $campaign->id;

            $note->save();

            return redirect("/campaign/" . $campaign->id);
        }
    }
}
