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
        Route::group(["prefix" => "/{campaignID}/notes", "as" => "notes::"], function(){
            Route::get("/", ["as" => "list", "uses" => "CampaignsController@notes"]);
            Route::get("/new", ["as" => "new", "uses" => "NotesController@showCreateNote"]);
            Route::get("/{noteID}", ["as" => "view", "uses" => "NotesController@showNote"]);
        });
    });

    // Invites
    Route::group(["prefix" => "invites", "as" => "invites::"], function(){
        Route::get('/', ["as" => "list", "uses" => "InviteController@getInvitesForCurrentUser"]);
        Route::get("/invites/accept/{inviteID}", ["as" => "accept", "uses" => "InviteController@acceptInvite"]);
    });

    // Notes
    Route::post("notes/new", "NotesController@createNote");

    // NPCs
    Route::get("/campaign/{campaignID}/npcs/", "NpcsController@npcs");
    Route::get('/campaigns/{campaignID}/npcs/new', 'NpcsController@createPage');
    Route::post('/campaigns/{campaignID}/npcs/new', 'NpcsController@create');
    Route::get('/campaign/{campaignID}/npc/{npcID}/', 'NpcsController@view');
    Route::get('/campaign/{campaignID}/npc/{npcID}/edit', 'NpcsController@editView');
    Route::post('/campaign/{campaignID}/npc/{npcID}/edit', 'NpcsController@update');

    // Notes
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
