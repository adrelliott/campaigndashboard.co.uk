<?php namespace Dashboard\Api\v0;
use \Route;

// Contacts
Route::group(array(
    'prefix' => 'api',
    'namespace' => 'Dashboard\Api\v0', 
    'before' => 'auth'
    ), 
    function()
    {
        Route::resource('contacts', 'ContactsController');
        Route::resource('users', 'UsersController');
        Route::resource('actions', 'ActionsController');
        Route::resource('broadcasts', 'BroadcastsController');
        // Route::get('/api', function(){ return 'hello'; });
        // Route::resource('contacts', 'ContactsController');
        // Route::resource('v1', 'ApiController');
    }
);


