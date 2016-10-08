<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Campaign;
use App\CharacterSheet;
use App\DndAttributes;
use Illuminate\Support\Facades\Auth;

class CharactersController extends Controller
{
    //
    public function create(Request $request){
            //code
            $name = $request->input("characterName");

            $character = new CharacterSheet;
            $character->characterName = $name;
            $character->player = Auth::user()->id;
            $attributes = new DndAttributes;


            $character->save();
            $attributes->charactersheetID = $character->id;
    }
}
