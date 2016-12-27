<?php

namespace App\Models\StaticContent\Dnd5;

use Illuminate\Database\Eloquent\Model;

class Monster extends Model{

    protected $table = 'static_dnd5_monsters';

    // cannot be called "features" due to some protected word inherited from 
    // Model
    public function _features() {
        return $this->hasMany("App\Models\StaticContent\Dnd5\Feature", "monster_id", "id");
    }

    public function _actions() {
        return $this->hasMany("App\Models\StaticContent\Dnd5\Action", "monster_id", "id");
    }

    public function getAlignmentName() {
    	switch($this->alignment_id){
    		case 1:
    			return "Lawful Good";
    			break;
    		case 2:
    			return "Chaotic Good";
    			break;
    		case 3:
    			return "Neutral Good";
    			break;
    		case 4:
    			return "Lawful Neutral";
    			break;
    		case 5:
    			return "True Neutral";
    			break;
    		case 6:
    			return "Chaotic Neutral";
    			break;
    		case 7:
    			return "Lawful Evil";
    			break;
    		case 8:
    			return "Neutral Evil";
    			break;
    		case 9:
    			return "Chaotic Evil";
    			break;
    	}
    }
}
