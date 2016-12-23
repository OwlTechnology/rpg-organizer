<?php

namespace App\Http\Controllers\ai;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiAiController extends Controller{
    
	public function handle(Request $request) {
		$content = $request->getContent();
        $req = json_decode($content);
		$outputJSON = [];
		$intentName = $req->result->metadata->intentName;
		
		if($intentName === "roll-intent"){
	        	$sideCount = $req->result->parameters->side_counts;
			$sides = intval($sideCount);
			$output = "";
			if($sides != 0){
				$rollResult = rand(1, $sides);
				if($rollResult >= $sideCount){
					$output = "You rolled a natural {$rollResult}!";
				}else{
					$output = "You rolled a {$rollResult}";
				}
			}else{
				$output = "Sorry, I don't know how to roll a dice with that many sides.";
			}
			$outputJSON = [
	       	     	    "speech" => $output,
	       	     	    "displayText" => $output,
	       	     	    "data" => [],
		            "contextOut" => [],
		            "source" => "RPG Organizer"
	 	       ];
		}else if($intentName === "tell-me-about-monster-intent"){
			$monsterName = $req->result->parameters->monster_name;
			$output = "";
			switch($monsterName){
				case "bear":
					$output = "Bears are pretty neat.";
					break;
				case "beholder":
					$output = "Ah, beholders are scary.";
					break;
				default:
					$output = "I'm not sure I know much about that monster!";
					break;
			}
			$outputJSON = [
			    "speech" => $output,
			    "displayText" => $output,
			    "data" => [],
			    "contextOut" => [],
			    "source" => "RPG Organizer"
			];
		}else{
			$outputJSON = [
			    "speech" => "Sorry I can't handle that request right now!",
			    "displayText" => "Sorry I can't handle that request right now!",
			    "data" => [],
			    "contextOut" => [],
			    "source" => "RPG Organizer"
			];
		}
        return response()->json($outputJSON);
	}

}
