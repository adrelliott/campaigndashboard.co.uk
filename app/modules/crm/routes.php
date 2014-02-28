<?php namespace Dashboard\Crm;

use Route, App;

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


// Route::get('/app/contacts/dump', array('uses' => 'Dashboard\Crm\ContactsController@Dump'));