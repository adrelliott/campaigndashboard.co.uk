<?php namespace Dashboard\Broadcasts;
use Route;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Broadcasts', 
    'before' => 'auth'
    ), 
    function()
    {
        Route::resource('broadcasts', 'BroadcastsController');
        // Route::resource('actions', 'ActionsController');
        // Route::resource('notes', 'NotesController');
    }
);
