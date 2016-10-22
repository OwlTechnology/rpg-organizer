<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Campaign;
use App\CharacterSheet;
use App\DndAttributes;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\dndAlignments;
use App\DndPersonality;

class CharactersController extends Controller
{
    //
    public function showCreateCharacter(){
        $alignmentOptions = dndAlignments::all();

        return view("characters.new", [
            "alignmentOptions" => $alignmentOptions
        ]);
    }


    public function create(Request $request){

            $name = $request->input("characterName");
            //get character name and player
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

            //get personality_traits
            $personality = new DndPersonality;
            $personality->personality_traits = $request->input("personalityTraits");
            $personality->ideals = $request->input("ideals");
            $personality->bonds = $request->input("bonds");
            $personality->flaws = $request->input("flaws");
            $personality->charactersheetID = $character->id;
            $personality->alignmentID = $request->input("alignment");
            $personality->save();


            return redirect("me/character/" . $character->id);
    }

    //showing character sheet
    public function showCharacter($characterID){
        $character = CharacterSheet::find($characterID);
        $attributes = DndAttributes::where("charactersheetID", $characterID)->get();
        $player = User::find($character->player);
        $personality = DndPersonality::where("charactersheetID", $characterID)->get()[0];
        $personality = $personality == null ? new DndPersonality : $personality;

        return view("/characters/view", [
            "character" => $character,
            "attributes" => $attributes->count() > 0 ? $attributes[0] : null,
            "player" => $player,
            "personalityTraits" => $personality->personality_traits,
            "ideals" => $personality->ideals,
            "flaws" => $personality->flaws,
            "bonds" => $personality->bonds,
            "alignment" => dndAlignments::find($personality->alignmentID)
        ]);


    }
}
