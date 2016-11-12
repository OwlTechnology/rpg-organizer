<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterSheet extends Model
{
    protected $table = "charactersheets";


    //check for personality and return it
    public function getPersonality(){
        $personality = DndPersonality::where("charactersheetID", $this->id)->first();
        if (!$personality){
            $personality = new DndPersonality;
            $personality->alignmentID = 1;
        }
        return $personality;
    }


    public function getAttributes(){
        $attributes = DndAttributes::where("charactersheetID", $this->id)->first();
        if (!$attributes){
            $attributes = new DndAttributes;
        }
        return $attributes;
    }
}
