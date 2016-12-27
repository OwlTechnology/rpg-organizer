<?php

namespace App\Models\StaticContent\Dnd5;

use Illuminate\Database\Eloquent\Model;

class Action extends Model{

    protected $table = 'static_dnd5_monsters_actions';

    public function monster() {
    	return $this->hasOne("App\Models\StaticContent\Dnd5\Monster", "id", "monster_id");
    }
}
