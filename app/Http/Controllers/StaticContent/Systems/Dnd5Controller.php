<?php

namespace App\Http\Controllers\StaticContent\Systems;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StaticContent\Dnd5\Monster;
use App\Models\StaticContent\Dnd5\Feature;
use App\Models\StaticContent\Dnd5\Action;

class Dnd5Controller extends Controller{

    public function overview() {
    	return view("static-content.dnd5.overview");
    }

    public function monstersManualList() {
        $monsters = Monster::all();

    	return view("static-content.dnd5.monstersManualList")->with([
            "monsters" => $monsters
        ]);
    }

    public function viewMonster(Monster $monster) {
        $features = $monster->_features;
        $actions = $monster->_actions;

        return view("static-content.dnd5.monsters-manual.view")->with([
            "monster" => $monster,
            "features" => $features,
            "actions" => $actions
        ]);
    }

    public function newMonsterView() {
    	return view("static-content.dnd5.monsters-manual.new");
    }

    public function newMonster(Request $request) {
    	$monster = new Monster;

    	$this->updateMonster($request, $monster);

    	return redirect()->route("static::dnd5::monsters-manual::list");
    }

    public function editMonsterView(Monster $monster) {
        return view("static-content.dnd5.monsters-manual.edit")->with([
            "monster" => $monster
        ]);
    }

    public function editMonster(Request $request, Monster $monster) {
        $this->updateMonster($request, $monster);

        return redirect()->route("static::dnd5::monsters-manual::view", $monster->id);
    }

    protected function updateMonster($request, $monster){
        $monster->name = $request->input("name");
        $monster->ai_name_key = $request->input("ai_name_key");
        $monster->classification = $request->input("classification");
        $monster->alignment_id = $request->input("alignment_id");
        $monster->armor_class = $request->input("armor_class");
        $monster->hit_points = $request->input("hit_points");
        $monster->hit_points_calculation = $request->input("hit_points_calculation");
        $monster->speed = $request->input("speed");
        $monster->speed_swim = $request->input("speed_swim");
        $monster->base_strength = $request->input("base_strength");
        $monster->base_dexterity = $request->input("base_dexterity");
        $monster->base_constitution = $request->input("base_constitution");
        $monster->base_intelligence = $request->input("base_intelligence");
        $monster->base_wisdom = $request->input("base_wisdom");
        $monster->base_charisma = $request->input("base_charisma");
        $monster->challenge_rating = $request->input("challenge_rating");
        $monster->average_exp = $request->input("average_exp");
        $monster->legendary_actions_description = $request->input("legendary_actions_description");

        $monster->save();
    }

    // ===== Features ===== //
    public function newFeatureView(Monster $monster) {
        return view('static-content.dnd5.monsters-manual.features.new')->with([
            "monster" => $monster
        ]);
    }

    public function newFeature(Request $request, Monster $monster) {
        $feature = new Feature;

        $feature->monster_id = $monster->id;
        $this->updateFeature($request, $feature);

        return redirect()->route("static::dnd5::monsters-manual::view", $monster->id);
    }

    protected function updateFeature($request, $feature){
        $feature->name = $request->input("name");
        $feature->description = $request->input("description");

        $feature->save();
    }

    // ===== Actions ===== //
    public function newActionView(Monster $monster) {
        return view('static-content.dnd5.monsters-manual.actions.new')->with([
            "monster" => $monster
        ]);
    }

    public function newAction(Request $request, Monster $monster){
        $action = new Action;

        $action->monster_id = $monster->id;
        $this->updateAction($request, $action);

        return redirect()->route("static::dnd5::monsters-manual::view", $monster->id);
    }

    protected function updateAction($request, $action){
        $action->name = $request->input("name");
        $action->attack_description = $request->input("attack_description");
        $action->denotation = $request->input("denotation");
        $action->description = $request->input("description");

        $action->save();
    }

}
