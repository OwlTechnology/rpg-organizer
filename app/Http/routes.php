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

    Route::get("/campaigns/new", function(){
        return view('campaigns.new');
    });

    Route::post('/campaigns/new', 'CampaignsController@create');
    Route::get("/logout", 'AccountsController@logout');
    Route::get("/campaign/{id}", "CampaignsController@index");

    //DungeonMaster Middleware.
    //@param campaign->id
    Route::group(["middleware" => "dm"], function(){
      Route::post("/campaign/delete", "CampaignsController@delete");
      Route::post("/campaign/update", "CampaignsController@update");
    });

});
