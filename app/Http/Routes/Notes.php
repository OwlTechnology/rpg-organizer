<?php

Route::group(["prefix" => "/{campaign}/notes", "as" => "notes::"], function(){
    Route::get("/", ["as" => "list", "uses" => "CampaignsController@notes"]);
    Route::get("/new", ["as" => "new", "uses" => "NotesController@showCreateNote"]);
    Route::post("/new", ["as" => "new.post", "uses" => "NotesController@createNote"]);
    Route::get("/{note}", ["as" => "view", "uses" => "NotesController@showNote"]);
    Route::get("/{note}/edit", ["as" => "edit", "uses" => "NotesController@showEditNote"]);
    Route::post("/{note}/edit" , ["as" => "edit.post", "uses" => "NotesController@updateNote"]);
    Route::get("/{note}/delete", ["as" => "delete", "uses" => "NotesController@deleteNote"]);
});