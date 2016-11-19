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
use App\Business\dnd\CharacterBusiness;

class CharactersController extends Controller{

    private $characterBusiness;

    public function __construct(){
        $this->characterBusiness = new CharacterBusiness;
    }
    public function showCreateCharacter(){
        $alignmentOptions = dndAlignments::all();
        $skills = $this->characterBusiness->getDefaultSkillList();
        return view("characters.new", [
            "alignmentOptions" => $alignmentOptions,
            "skills" => $skills
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

            //get skills
            foreach ($this->characterBusiness->getDefaultSkillList() as $skillName){
                $skill = $this->characterBusiness->getSkill($character->id,$skillName);
                $skill->isProficient = $request->input($skillName . "proficiency");
                $skill->proficiencyMultiplier = $request->input($skillName . "proficiencyMultiplier");
                $skill->save();
            }


            return redirect("me/character/" . $character->id);
    }

    //showing character sheet
    public function showCharacter($characterID){
        $character = CharacterSheet::find($characterID);
        $attributes = $character->getAttributes();
        $player = User::find($character->player);
        $personality = $character->getPersonality();

        return view("characters.view", [
            "character" => $character,
            "attributes" => $attributes,
            "player" => $player,
            "personalityTraits" => $personality->personality_traits,
            "ideals" => $personality->ideals,
            "flaws" => $personality->flaws,
            "bonds" => $personality->bonds,
            "alignment" => dndAlignments::find($personality->alignmentID),
            "skills" => $this->characterBusiness->getCharacterSkills($characterID)
        ]);

    }
}
