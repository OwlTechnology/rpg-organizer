<?php

Route::get('/', function () {
    return view('static.index');
});

Route::get('/login', function () {
    return view("accounts.login");
});

Route::get('/signup', function(){
    return view("accounts.signup");
});
