<?php namespace Dashboard\Me;

use Route, App;

// Contacts
Route::group(array(
    'prefix' => 'me', 
    'namespace' => 'Dashboard\Me',

    ), 
    function()
    {
        Route::get('login', array( 'as' => 'client_login', 'uses' => 'SessionsController@create' ));
        Route::post('login', array( 'as' => 'client_login', 'uses' => 'SessionsController@store' ));
        Route::get('logout', array( 'as' => 'client_login', 'uses' => 'SessionsController@destroy' ));

        Route::get('/{id}', array( 'as' => 'me', 'uses' => 'ProfileController@show', 'before' => 'auth.clientLogin' ));
    }
);
