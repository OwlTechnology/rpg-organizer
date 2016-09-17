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

}
