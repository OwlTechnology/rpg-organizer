<?php

namespace App\Models\StaticContent\Dnd5;

use Illuminate\Database\Eloquent\Model;

class Race extends Model{
    protected $table = 'static_dnd5_races';

    public function getSizeName() {
    	switch($this->size_id){
    		case 0:
    			return "Small";
    			break;
    		case 1:
    			return "Medium";
    			break;
    		case 3:
    			return "Large";
    			break;
    		default:
    			return "Unknown";
    			break;
    	}
    }
}
