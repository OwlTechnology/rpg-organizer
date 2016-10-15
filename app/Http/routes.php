<?php

Route::get('/', function () {
    return view('static.index');
});

Route::get('/login', 'AccountsController@showLogin');
Route::post('/login', 'AccountsController@login');

Route::get('/signup', 'AccountsController@showSignup');
Route::post('/signup', 'AccountsController@signup');

// Secure Routes
Route::group(["middleware" => "auth"], function(){
    Route::get('/me', 'AccountsController@showHomePage');

    // Campaigns

    Route::get("/campaigns/new", function(){
        return view('campaigns.new');
    });

    Route::post('/campaigns/new', 'CampaignsController@create');
    Route::get("/logout", 'AccountsController@logout');
    Route::get("/campaign/{id}", "CampaignsController@index");

    Route::post("/campaign/invite", "InviteController@createCampaignInvite");

    // Invites
    Route::get("/invites", "InviteController@getInvitesForCurrentUser");

    //DungeonMaster Middleware.
    //@param campaign->id
    Route::group(["middleware" => "dm"], function(){
      Route::post("/campaign/delete", "CampaignsController@delete");
      Route::post("/campaign/update", "CampaignsController@update");
    });

    // Notes
    Route::get("/campaign/{campaignID}/notes/", "CampaignsController@notes");

    Route::get("/campaigns/{campaignID}/notes/new", "NotesController@showCreateNote");
    Route::get("/campaign/{campaignID}/notes/{noteID}", "NotesController@showNote");
    Route::post("notes/new", "NotesController@createNote");
    Route::get("/campaign/{campaignID}/notes/{noteID}/edit", "NotesController@showEditNote");
    Route::post("/campaign/{campaignID}/notes/{noteID}/edit" , "NotesController@updateNote");
    Route::get("/campaign/{campaignID}/note/{noteID}/delete", "NotesController@deleteNote");

    // Locations
    Route::get("/campaign/{campaignID}/locations", "LocationsController@showLocations");
    Route::get("/campaigns/{campaignID}/locations/new", "LocationsController@showCreateLocation");
    Route::post("/campaigns/{campaignID}/locations/new", "LocationsController@createLocation");
    Route::get("/campaign/{campaignID}/location/{locationID}", "LocationsController@showLocation");
    Route::get("/campaign/{campaignID}/location/{locationID}/edit", "LocationsController@showEditLocation");
    Route::post("/campaign/{campaignID}/location/{locationID}/edit", "LocationsController@updateLocation");
    Route::get("/campaign/{campaignID}/location/{locationID}/delete", "LocationsController@deleteLocation");
});
