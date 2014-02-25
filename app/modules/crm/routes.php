<?php 

// Set up namespace
namespace Dashboard\Crm;
use Route;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Crm', 
    'before' => 'auth'
    ), 
    function()
    {
        Route::resource('contacts', 'ContactsController');
        Route::resource('actions', 'ActionsController');
        Route::resource('notes', 'NotesController');
    }
);
