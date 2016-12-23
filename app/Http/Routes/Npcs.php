<?php

Route::group(["prefix" => "/{campaign}/npcs", "as" => "npcs::"], function() {
    Route::get("/", ["as" => "list", "uses" => "NpcsController@npcs"]);
    Route::get('/new', ["as" => "new", "uses" => 'NpcsController@createPage']);
    Route::post('/new', ["as" => "new.post", "uses" => 'NpcsController@create']);
    Route::get('/{npc}', ["as" => "view", "uses" => 'NpcsController@view']);
    Route::get('/{npc}/edit', ["as" => "edit", "uses" => 'NpcsController@editView']);
    Route::post('/{npc}/edit', ["as" => "edit.post", "uses" => 'NpcsController@update']);
});