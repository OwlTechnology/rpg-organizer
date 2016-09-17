<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function getVisibilityType (){
      return NoteVisibilityType::find($this->visible_to);
    }
}
