<?php namespace Dashboard\Template;

use Route, App;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Template', 
    'before' => 'auth'
    ), 
    function()
    {
        // Route::resource('contacts', 'ContactsController');
        // 
        // 
        //  DONT FORGET TO CHANGE 'enabled:false' IN module.json!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    }
);