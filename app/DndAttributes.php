<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DndAttributes extends Model
{
    //
    protected $table = "dnd_attributes";


    public function getAttributesMap(){
        return [
            "strength" => $this->strength,
            "dexterity" => $this->dexterity,
            "constitution" => $this->constitution,
            "intelligence" => $this->intelligence,
            "wisdom" => $this->wisdom,
            "charisma" => $this->charisma
        ];
    }
}
