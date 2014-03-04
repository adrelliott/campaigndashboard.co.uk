<?php namespace Dashboard\Leads;

use Route, App;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Leads', 
    'before' => 'auth'
    ), 
    function()
    {
        Route::resource('leads', 'LeadsController');
        // 
        // 
        //  DONT FORGET TO CHANGE 'enabled:false' IN module.json!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    }
);