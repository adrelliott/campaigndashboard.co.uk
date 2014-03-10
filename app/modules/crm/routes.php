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

    }
);


// Route::get('/app/contacts/dump', array('uses' => 'Dashboard\Crm\ContactsController@Dump'));

Route::get('app/addRole/{contact_id}/{role_id}', function($contact_id, $role_id)
{
    // Get the contact
    $contact = Contact::find($contact_id);

    $role = new \Dashboard\Crm\ContactRole;

    $role->role_id = 1;
    $role->owner_id = 10222;
    $role->role_variant = '2013';


    // Now add the role
    $result = $contact->roles()->save($role);

    return $contact->roles;
});