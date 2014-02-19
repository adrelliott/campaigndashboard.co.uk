<?php

/**
 * NOTE: We use MODULES in this app. Look in the app/modules folder for all routes
 */


Route::get('/', function(){
    return 'You shouldn\'t be here, should you?';
});

Route::get('/app', function(){
    return Redirect::route('dashboard');
});
