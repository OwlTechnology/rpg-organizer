<?php

Route::group(["prefix" => "static", "as" => "static::", "namespace" => "StaticContent"], function() {
	Route::get('/systems', ["as" => "systems", "uses" => "SystemsController@listView"]);

	Route::group(["prefix" => "dnd5", "as" => "dnd5::", "namespace" => "Systems"], function() {
		Route::get('/', ["as" => "overview", "uses" => "Dnd5Controller@overview"]);
		Route::get('/mm', ["as" => "monsters-manual", "uses" => "Dnd5Controller@monstersManualList"]);
	});
});