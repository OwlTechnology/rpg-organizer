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
            $skill->baseAttribute = "strength";
            $skill->temporaryModifier = 1;
            $skill->save();

        }
        return $skill;
    }
    public function getDefaultSkillList(){
        $skills = ["Acrobatics", "Animal Handling", "Arcana", "Athletics",
         "Deception", "History", "Insight", "Intimidation", "Investigation",
         "Medicine", "Nature", "Perception", "Performance", "Persuasion",
         "Religion", "Sleight of Hand", "Stealth", "Survival"];
         return $skills;
    }

    public function createDefaultSkills(){
        $skills = [
            $this->createDefaultSkill("Acrobatics", "dexterity"),
            $this->createDefaultSkill("Animal Handling", "wisdom"),
            $this->createDefaultSkill("Arcana", "intelligence"),
            $this->createDefaultSkill("Athletics", "strength"),
            $this->createDefaultSkill("Deception", "charisma"),
            $this->createDefaultSkill("History", "intelligence"),
            $this->createDefaultSkill("Insight", "wisdom"),
            $this->createDefaultSkill("Intimidation", "charisma"),
            $this->createDefaultSkill("Investigation", "intelligence"),
            $this->createDefaultSkill("Medicine", "wisdom"),
            $this->createDefaultSkill("Nature", "intelligence"),
            $this->createDefaultSkill("Perception", "wisdom"),
            $this->createDefaultSkill("Performance", "charisma"),
            $this->createDefaultSkill("Persuasion", "charisma"),
            $this->createDefaultSkill("Religion", "intelligence"),
            $this->createDefaultSkill("Sleight of Hand", "dexterity"),
            $this->createDefaultSkill("Stealth", "dexterity"),
            $this->createDefaultSkill("Survival", "wisdom")
        ];
        return $skills;
    }

    protected function createDefaultSkill($name, $baseAttribute){
        $skill = new DndCharacterSkills;
        $skill->name = $name;
        $skill->baseAttribute = $baseAttribute;
        return $skill;
    }

    public function getCharacterSkills($characterId){
        $skills = DndCharacterSkills::where("characterId", $characterId)->get();
        return $skills;
    }

}
