<?php namespace Dashboard\Me;

use Route, App;

// Contacts
Route::group(array(
    'prefix' => 'me', 
    'namespace' => 'Dashboard\Me'
    ), 
    function()
    {
        Route::get('/{id}', array( 'as' => 'me', 'uses' => 'ProfileController@show' ));
    }
);
