<?php

namespace App\Http\Controllers\ai;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiAiController extends Controller{
    
    /**
    * Endpoint that handles all requests from API.AI; delegates out actions
    * depending on what API.AI sent in its request.
    */
	public function handle(Request $request) {
		$content = $request->getContent();
        $req = json_decode($content);
		$outputJSON = [];
		$intentName = $req->result->metadata->intentName;
		
		// Delegate to handlers for different intents
		if($intentName === "roll-intent"){
	        $outputJSON = $this->handleRollIntent($req);
		}else if($intentName === "tell-me-about-monster-intent"){
			$outputJSON = $this->handleTellMeAboutMonsterIntent($req);
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

	/**
	* Handles the roll request from API.AI; if a user asks something like "roll
	* a d20", this will be called.
	*/
	public function handleRollIntent($req) {
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

		return [
			"speech" => $output,
			"displayText" => $output,
			"data" => [],
			"contextOut" => [],
			"source" => "RPG Organizer"
		];
	}

	/**
	* Handles requests from API.AI wherein users ask for the AI to tell them
	* information about a specific monster or creature.
	*/
	public function handleTellMeAboutMonsterIntent($req) {
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
	}

}
