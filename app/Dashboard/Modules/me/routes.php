<?php namespace Dashboard\Me;

use Route, App;

// Contacts
Route::group(array(
    'prefix' => 'me', 
    'namespace' => 'Dashboard\Me',

    ), 
    function()
    {
        Route::get('login', array( 'as' => 'me.contact_login', 'uses' => 'SessionsController@create' ));
        Route::post('login', array( 'as' => 'me.contact_login', 'uses' => 'SessionsController@store' ));
        Route::get('logout', array( 'as' => 'me.contact_logout', 'uses' => 'SessionsController@destroy' ));

        Route::get('/{id}', array( 'as' => 'me', 'uses' => 'ProfileController@show', 'before' => 'auth.clientLogin' ));
        Route::patch('/{id}', array( 'as' => 'me', 'uses' => 'ProfileController@update', 'before' => 'auth.clientLogin' ));
        Route::patch('/{id}/contact', array( 'as' => 'me.contact', 'uses' => 'ProfileController@update', 'before' => 'auth.clientLogin' ));
    }
);
