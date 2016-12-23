<?php

Route::group(["prefix" => "/{campaign}/locations", "as" => "locations::"], function() {
    Route::get("/", ["as" => "list", "uses" => "LocationsController@showLocations"]);
    Route::get("/new", ["as" => "new", "uses" => "LocationsController@showCreateLocation"]);
    Route::post("/new", ["as" => "new.post", "uses" => "LocationsController@createLocation"]);
    Route::get("/{location}", ["as" => "view", "uses" => "LocationsController@showLocation"]);
    Route::get("/{location}/edit", ["as" => "edit", "uses" => "LocationsController@showEditLocation"]);
    Route::post("/{location}/edit", ["as" => "edit.post", "uses" => "LocationsController@updateLocation"]);
    Route::get("/{location}/delete", ["as" => "delete", "uses" => "LocationsController@deleteLocation"]);
});