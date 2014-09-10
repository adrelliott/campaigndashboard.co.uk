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

        // Testing MailChimp Api
        Route::get('contacts/addToList/{id}',
            array('uses' => 'ContactsController@addToList'));


        Route::resource('contacts', 'ContactsController');
        Route::resource('contacts.roles', 'RolesController');
        Route::resource('actions', 'ActionsController');
        Route::resource('contacts.notes', 'NotesController');

        Route::post('contacts/storeRole', array('as' => 'app.contacts.storeRole', 'uses' => 'ContactsController@storeRole'));
    }
);
