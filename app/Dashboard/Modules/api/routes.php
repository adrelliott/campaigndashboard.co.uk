<?php namespace Dashboard\Api;

use Route;

// Set up contacts
Route::group(array(
    'prefix' => 'api', 
    'before' => 'auth',
    'namespace' => 'Dashboard\Api'
    ), 
    function()
    {

        /**
         * Sets up the default RESTful endpoints
         */
        Route::resource('contacts', 'ApiContactsController');

    }
);
