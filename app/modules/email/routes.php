<?php 

// Set up namespace
namespace Dashboard\Email;
use Route;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Email', 
    'before' => 'auth'
    ), 
    function()
    {
        Route::resource('broadcasts', 'BroadcastsController');
        // Route::resource('actions', 'ActionsController');
        // Route::resource('notes', 'NotesController');
    }
);
