<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //
    protected $table = 'campaigns';

    public function dungeonMaster (){
      return User::find($this->dm);
    }

    public function playerAssociations(){
        return $this->hasMany('App\PlayerInCampaign', 'FK_campaign', 'id');
    }

}
