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
    Route::get("/logout", 'AccountsController@logout');

    Route::group(["as" => "profile::", "prefix" => "/me"], function(){
        Route::get('/', ['as' => 'overview', 'uses' => 'AccountsController@showHomePage']);
        Route::get('/campaigns', ['as' => 'campaigns', 'uses' => 'AccountsController@showCampaigns']);
    });

    // Campaigns
    Route::group(["prefix" => "campaign", "as" => "campaign::"], function(){
        Route::get('/new', ["as" => "new", "uses" => function(){
            return view("campaigns.new");
        }]);
        Route::post('/new', ["as" => "new.post", "uses" => "CampaignsController@create"]);
        Route::get("/{id}", ["as" => "view", "uses" => "CampaignsController@index"])->middleware("IsInCampaign");
        Route::post("/invite", ["as" => "invite", "uses" => "InviteController@createCampaignInvite"]);

        Route::get("/{campaignID}/kick-player/{playerID}", ["as" => "kick-player", "uses" => "CampaignsController@kickPlayer"])->middleware("dm");

        //DungeonMaster Middleware.
        //@param campaign->id
        Route::group(["middleware" => "dm"], function(){
            Route::post("/delete", ["as" => "delete.post", "uses" => "CampaignsController@delete"]);
            Route::post("/update", ["as" => "update.post", "uses" => "CampaignsController@update"]);
        });

        // Notes
        Route::group(["prefix" => "/{campaign}/notes", "as" => "notes::"], function(){
            Route::get("/", ["as" => "list", "uses" => "CampaignsController@notes"]);
            Route::get("/new", ["as" => "new", "uses" => "NotesController@showCreateNote"]);
            Route::post("/new", ["as" => "new.post", "uses" => "NotesController@createNote"]);
            Route::get("/{note}", ["as" => "view", "uses" => "NotesController@showNote"]);
            Route::get("/{note}/edit", ["as" => "edit", "uses" => "NotesController@showEditNote"]);
            Route::post("/{note}/edit" , ["as" => "edit.post", "uses" => "NotesController@updateNote"]);
            Route::get("/{note}/delete", ["as" => "delete", "uses" => "NotesController@deleteNote"]);
        });

        // NPCs
        Route::group(["prefix" => "/{campaign}/npcs", "as" => "npcs::"], function() {
            Route::get("/", ["as" => "list", "uses" => "NpcsController@npcs"]);
            Route::get('/new', ["as" => "new", "uses" => 'NpcsController@createPage']);
            Route::post('/new', ["as" => "new.post", "uses" => 'NpcsController@create']);
            Route::get('/{npc}', ["as" => "view", "uses" => 'NpcsController@view']);
            Route::get('/{npc}/edit', ["as" => "edit", "uses" => 'NpcsController@editView']);
            Route::post('/{npc}/edit', ["as" => "edit.post", 'NpcsController@update']);
        });
    });

    // Invites
    Route::group(["prefix" => "invites", "as" => "invites::"], function(){
        Route::get('/', ["as" => "list", "uses" => "InviteController@getInvitesForCurrentUser"]);
        Route::get("/invites/accept/{inviteID}", ["as" => "accept", "uses" => "InviteController@acceptInvite"]);
    });

    // Locations
    Route::get("/campaign/{campaignID}/locations", "LocationsController@showLocations");
    Route::get("/campaigns/{campaignID}/locations/new", "LocationsController@showCreateLocation");
    Route::post("/campaigns/{campaignID}/locations/new", "LocationsController@createLocation");
    Route::get("/campaign/{campaignID}/location/{locationID}", "LocationsController@showLocation");
    Route::get("/campaign/{campaignID}/location/{locationID}/edit", "LocationsController@showEditLocation");
    Route::post("/campaign/{campaignID}/location/{locationID}/edit", "LocationsController@updateLocation");
    Route::get("/campaign/{campaignID}/location/{locationID}/delete", "LocationsController@deleteLocation");
});
