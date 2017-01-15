<?php

namespace App\Http\Controllers\ai;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StaticContent\Dnd5\Monster;
use App\Models\StaticContent\Dnd5\Feature;
use App\Models\StaticContent\Dnd5\Race;

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
		}else if($intentName === "monster-stat-intent"){
			$outputJSON = $this->handleMonsterStatIntent($req);
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

		$monster = Monster::where("ai_name_key", $monsterName)->first();

		if($monster){
			$alignmentName = $monster->getAlignmentName();

			$output = "A {$monster->name} is a {$alignmentName} {$monster->classification}.";
		}else{
			$output = "I don't know much about that monster right now!";
		}

		return [
		    "speech" => $output,
		    "displayText" => $output,
		    "data" => [],
		    "contextOut" => [],
		    "source" => "RPG Organizer"
		];
	}

	public function handleDndRaceIntent($req) {
		$raceKey = $req->result->parameters->race;

		$race = Race::where("api_ai_key", $raceKey)->first();

		if(!$race) {
			return [
				"speech" => "Sorry, I don't "
			];
		}
	}

	public function handleMonsterStatIntent($req) {
		$monsterName = $req->result->parameters->monster;
		$statName = $req->result->parameters->monster_stat_name;

		// Try to find the monster the user asked about
		$monster = Monster::where("ai_name_key", $monsterName)->first();

		if(!$monster){
			return [
				"speech" => "Sorry, I don't know much about that monster at this point!",
				"displayText" => "I don't know about that monster.",
				"data" => [],
				"contextOut" => [],
				"source" => "RPG Organizer"
			];
		}

		// assuming we found the monster, let's process some requests
		$output = "";

		switch($statName){
			case "alignment":
				$output = "They are {$monster->getAlignmentName()}";

				break;
			case "armor_class":
				$output = "A normal {$monster->name} has an armor class of {$monster->armor_class}.";

				break;
			case "hit_points":
				$output = "A normal {$monster->name} has an average of {$monster->hit_points} health.";

				break;
			case "classification":
				$output = "A {$monster->name} is a {$monster->classification}.";

				break;
			case "strength":
				$output = "Your average {$monster->name} has a strength of {$monster->base_strength}.";

				break;
			case "dexterity":
				$output = "The average {$monster->name} has a dexterity of {$monster->base_dexterity}.";

				break;
			case "constitution":
				$output = "The average {$monster->name} has a constitution of {$monster->base_constitution}.";

				break;
			case "intelligence":
				$output = "Your average {$monster->name}'s intelligence is {$monster->base_intelligence}.";

				break;
			case "wisdom":
				$output = "An average {$monster->name} has about {$monster->base_wisdom} wisdom.";

				break;
			case "charisma":
				$output = "The charisma of your average {$monster->name} is {$monster->base_charisma}.";

				break;
			case "speed":
				$output = "The speed of an average {$monster->name} is {$monster->speed} feet per round.";

				break;
			case "challenge_rating":
				$output = "The challenge rating of a {$monster->name} is {$monster->challenge_rating}.";

				break;
			case "experience":
				$output = "You would get {$monster->average_exp} experience for killing a {$monster->name}.";

				break;
			default:
				$output = "Sorry, I can't tell you about that stat yet.";
				break;
		}

		return [
			"speech" => $output,
			"displayText" => $output,
			"data" => [],
			"contextOut" => [],
			"source" => "RPG Organizer"
		];
	}

}
