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
    Route::get("/logout", 'AccountsController@logout');

    // Campaigns
    Route::group(["prefix" => "campaign", "as" => "campaign::"], function(){
        Route::get('/new', ["as" => "new", "uses" => function(){
            return view("campaigns.new");
        }]);
        Route::post('/new', ["as" => "new.post", "uses" => "CampaignsController@create"]);

        //DungeonMaster Middleware.
        //@param campaign->id
        Route::group(["middleware" => "dm"], function(){
            Route::post("/delete", ["as" => "delete.post", "uses" => "CampaignsController@delete"]);
            Route::post("/update", ["as" => "update.post", "uses" => "CampaignsController@update"]);
        });
    });

    // Campaigns
    Route::get("/campaign/{id}", "CampaignsController@index")->middleware("IsInCampaign");

    Route::post("/campaign/invite", "InviteController@createCampaignInvite");
    Route::get("/campaign/{campaignID}/kick-player/{playerID}", "CampaignsController@kickPlayer")->middleware("dm");

    // Invites
    Route::get("/invites", "InviteController@getInvitesForCurrentUser");
    Route::get("/invites/accept/{inviteID}", "InviteController@acceptInvite");

    // Notes
    Route::get("/campaign/{campaignID}/notes/", "CampaignsController@notes");

    Route::get("/campaigns/{campaignID}/notes/new", "NotesController@showCreateNote");
    Route::get("/campaign/{campaignID}/notes/{noteID}", "NotesController@showNote");
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
