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
        Route::resource('roles', 'RolesController');

        Route::post('contacts/storeRole', array('as' => 'app.contacts.storeRole', 'uses' => 'ContactsController@storeRole'));
    }
);
