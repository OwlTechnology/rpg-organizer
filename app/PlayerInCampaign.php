<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerInCampaign extends Model
{
    protected $table = 'playerInCampaign';

    public function user(){
        return $this->hasOne('App\User', 'id', 'FK_user');
    }
}
