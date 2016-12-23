<?php

Route::group(["prefix" => "static", "as" => "static::", "namespace" => "StaticContent"], function() {
	Route::get('/systems', ["as" => "systems", "uses" => "SystemsController@listView"]);

	Route::group(["prefix" => "dnd5", "as" => "dnd5::", "namespace" => "Systems"], function() {
		Route::get('/', ["as" => "overview", "uses" => "Dnd5Controller@overview"]);

		Route::group(["prefix" => "mm", "as" => "monsters-manual::"], function() {
			Route::get('/', ["as" => "list", "uses" => "Dnd5Controller@monstersManualList"]);
			Route::get('/new', ["as" => "new", "uses" => "Dnd5Controller@newMonsterView"]);
			Route::post('/new', ["as" => "new.post", "uses" => "Dnd5Controller@newMonster"]);
			Route::get('/{monster}', ["as" => "view", "uses" => "Dnd5Controller@viewMonster"]);
		});
	});
});