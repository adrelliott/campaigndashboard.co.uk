<?php 

// Set up namespace
namespace Dashboard\Broadcast;
use Route;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Broadcast', 
    'before' => 'auth'
    ), 
    function()
    {
        Route::resource('broadcasts', 'BroadcastsController');
        // Route::resource('actions', 'ActionsController');
        // Route::resource('notes', 'NotesController');
    }
);
