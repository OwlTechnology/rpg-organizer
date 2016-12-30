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
            Route::post("/{campaign}/delete", ["as" => "delete.post", "uses" => "CampaignsController@delete"]);
            Route::post("/update", ["as" => "update.post", "uses" => "CampaignsController@update"]);
        });

        // Extra routes for campaign resources
        include "Routes/Notes.php";
        include "Routes/Npcs.php";
        include "Routes/Locations.php";
    });

    // Invites
    Route::group(["prefix" => "invites", "as" => "invites::"], function(){
        Route::get('/', ["as" => "list", "uses" => "InviteController@getInvitesForCurrentUser"]);
        Route::get("/invites/accept/{inviteID}", ["as" => "accept", "uses" => "InviteController@acceptInvite"]);
    });

    // Static Content
    include "Routes/StaticContent.php";
});

// Google API.AI
Route::group(["prefix" => "/api/ai", "as" => "ai::", "namespace" => "ai"], function() {
    Route::any('/handle', ["as" => "default", "uses" => "ApiAiController@handle"]);
});
