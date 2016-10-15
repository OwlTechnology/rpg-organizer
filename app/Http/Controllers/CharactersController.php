<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Campaign;
use App\CharacterSheet;
use App\DndAttributes;
use Illuminate\Support\Facades\Auth;
use App\User;

class CharactersController extends Controller
{
    //
    public function create(Request $request){
            //code
            $name = $request->input("characterName");

            $character = new CharacterSheet;
            $character->characterName = $name;
            $character->player = Auth::user()->id;
            $character->save();

            //get attributes
            $attributes = new DndAttributes;
            $attributes->strength = $request->input("strength");
            $attributes->dexterity = $request->input("dexterity");
            $attributes->constitution = $request->input("constitution");
            $attributes->intelligence = $request->input("intelligence");
            $attributes->wisdom = $request->input("wisdom");
            $attributes->charisma = $request->input("charisma");
            $attributes->charactersheetID = $character->id;
            $attributes->save();

            return redirect("me/character/" . $character->id);
    }

    //showing character sheet
    public function showCharacter($characterID){
        $character = CharacterSheet::find($characterID);
        $attributes = DndAttributes::where("charactersheetID", $characterID)->get();
        $player = User::find($character->player);
        return view("/characters/view", [
            "character" => $character,
            "attributes" => $attributes->count() > 0 ? $attributes[0] : null,
            "player" => $player
        ]);


    }
}
