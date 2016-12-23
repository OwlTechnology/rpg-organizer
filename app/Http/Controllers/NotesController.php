<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Campaign;
use App\Http\Requests;

class NotesController extends Controller
{
    public function showCreateNote(Campaign $campaign){
        return view("notes.new", [
            "campaign" => $campaign
        ]);
    }

    public function showNote(Campaign $campaign, Note $note){
        // make sure note is actually owned by this campaign
        if($note->campaign != $campaign->id){
            abort(404);
        }

        return view("notes.view", [
            "note" => $note,
            "campaign" => $campaign
        ]);
    }

    public function createNote(Request $request, Campaign $campaign){
        $name = $request->input("name");
        $description = $request->input("description");
        $content = $request->input("content");

        if($campaign){
            // create note
            $note = new Note;

            $note->name = $name;
            $note->description = $description;
            $note->campaign = $campaign->id;
            $note->content = $content;

            $note->save();

            return redirect("/campaign/" . $campaign->id . "/notes/");
        }else{
            abort(404);
        }
    }

    public function showEditNote(Campaign $campaign, Note $note){
        return view("notes.edit", [
            "note" => $note,
            "campaign" => $campaign
        ]);
    }


    public function deleteNote(Campaign $campaign, Note $note){
        $note->delete();

        return redirect("/campaign/" . $campaign->id . "/notes/");


    }
    public function updateNote(Request $request, Campaign $campaign, Note $note){
        // Get data
        $name = $request->input("newName");
        $description = $request->input("newDescription");
        $content = $request->input("newContent");

        // Update note
        $note->name = $name;
        $note->description = $description;
        $note->content = $content;

        $note->save();

        return redirect("/campaign/" . $note->campaign . "/notes/" . $note->id);
    }
}
