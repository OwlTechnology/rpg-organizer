<?php
namespace App\Business\dnd;
use App\DndCharacterSkills;


class CharacterBusiness{
    public function getSkill($characterId, $name){
        //look for skill related to character
        $skill = DndCharacterSkills::where("characterId", $characterId)->where("name", $name)->first();
        //if there isn't a skill by that name create one with default values
        if(!$skill){
            $skill = new DndCharacterSkills;
            $skill->characterId = $characterId;
            $skill->name = $name;
            $skill->proficiencyMultiplier = 1;
            $skill->baseAttribute = 0;
            $skill->temporaryModifier = 1;
            $skill->save();

        }
        return $skill;
    }
    public function getDefaultSkillList(){
        $skills = ["Acrobats", "Animal Handling", "Arcana", "Athletics",
         "Deception", "History", "Insight", "Intimidation", "Investigation",
         "Medicine", "Nature", "Perception", "Performance", "Persuasion",
         "Religion", "Sleight of Hand", "Stealth", "Survival"];
         return $skills;
    }

    public function getCharacterSkills($characterId){
        $skills = DndCharacterSkills::where("characterId", $characterId)->get();
        return $skills;
    }

}
