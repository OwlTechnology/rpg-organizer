<?php

Route::group(["prefix" => "static", "as" => "static::", "namespace" => "StaticContent", "middleware" => "IsStaticManager"], function() {
	Route::get('/systems', ["as" => "systems", "uses" => "SystemsController@listView"]);

	Route::group(["prefix" => "dnd5", "as" => "dnd5::", "namespace" => "Systems"], function() {
		Route::get('/', ["as" => "overview", "uses" => "Dnd5Controller@overview"]);

		// Monster's Manual
		Route::group(["prefix" => "mm", "as" => "monsters-manual::"], function() {
			Route::get('/', ["as" => "list", "uses" => "Dnd5Controller@monstersManualList"]);
			Route::get('/new', ["as" => "new", "uses" => "Dnd5Controller@newMonsterView"]);
			Route::post('/new', ["as" => "new.post", "uses" => "Dnd5Controller@newMonster"]);
			Route::get('/{monster}/edit', ["as" => "edit", "uses" => "Dnd5Controller@editMonsterView"]);
			Route::post('/{monster}/edit', ["as" => "edit.post", "uses" => "Dnd5Controller@editMonster"]);
			Route::get('/{monster}', ["as" => "view", "uses" => "Dnd5Controller@viewMonster"]);

			// Features
			Route::group(["prefix" => "/{monster}/features", "as" => "features::"], function() {
				Route::get('/new', ["as" => "new", "uses" => "Dnd5Controller@newFeatureView"]);
				Route::post('/new', ["as" => "new.post", "uses" => "Dnd5Controller@newFeature"]);
			});

			// Actions
			Route::group(["prefix" => "/{monster}/actions", "as" => "actions::"], function() {
				Route::get('/new', ["as" => "new", "uses" => "Dnd5Controller@newActionView"]);
				Route::post('/new', ["as" => "new.post", "uses" => "Dnd5Controller@newAction"]);
			});
		});

		// Races
		Route::group(["prefix" => "races", "as" => "races::"], function() {
			Route::get('/', ["as" => "list", "uses" => "Dnd5Controller@racesList"]);
			Route::get('/new', ["as" => "new", "uses" => "Dnd5Controller@newRaceView"]);
			Route::post('/new', ["as" => "new.post", "uses" => "Dnd5Controller@newRace"]);
			Route::get('/{race}', ["as" => "view", "uses" => "Dnd5Controller@viewRace"]);
		});
	});
});