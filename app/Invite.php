<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $table = "invites";

    public function playerFrom(){
        return $this->hasOne('App\User', 'id', 'FK_userSentFrom');
    }

    public function playerTo(){
        return $this->hasOne('App\User', 'id', 'FK_userSentTo');
    }
}
