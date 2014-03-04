<?php namespace Dashboard\Tags;

use Route, App;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Tags', 
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