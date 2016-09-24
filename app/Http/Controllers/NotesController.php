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

    public function showNote($campaignID, $noteID){
        $note = Note::find($noteID);
        $campaign = Campaign::find($campaignID);

        return view("notes.view", [
            "note" => $note,
            "campaign" => $campaign
        ]);
    }

    public function createNote(Request $request){
        $name = $request->input("name");
        $description = $request->input("description");
        $campaignID = $request->input("_campaign_id");
        $content = $request->input("content");
        // Find associated campaign
        $campaign = Campaign::find($campaignID);

        if($campaign){
            // create note
            $note = new Note;

            $note->name = $name;
            $note->description = $description;
            $note->campaign = $campaign->id;
            $note->content = $content;
            
            $note->save();

            return redirect("/campaign/" . $campaign->id);
        }
    }

    public function showEditNote($campaignID, $noteID){
        $note = Note::find($noteID);
        $campaign = Campaign::find($campaignID);
        return view("notes.edit", [
            "currentNote" => $note,
            "currentCampaign" => $campaign
        ]);
    }
    public function updateNote(Request $request, $campaignID, $noteID){
        // Get data
        $name = $request->input("newName");
        $description = $request->input("newDescription");
        $content = $request->input("newContent");

        // Update note
        $note = Note::find($noteID);

        $note->name = $name;
        $note->description = $description;
        $note->content = $content;

        $note->save();

        return redirect("/campaign/" . $note->campaign . "/notes/" . $note->id);
    }
}
