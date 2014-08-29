<?php namespace Dashboard\Me;

use Route, App, Event;

Route::group(array(
    'prefix' => 'me', 
    'namespace' => 'Dashboard\Me',

    ), 
    function()
    {
        Route::get('login', array( 'as' => 'me.contact_login', 'uses' => 'SessionsController@create' ));
        Route::post('login', array( 'as' => 'me.contact_login', 'uses' => 'SessionsController@store' ));
        Route::get('logout', array( 'as' => 'me.contact_logout', 'uses' => 'SessionsController@destroy' ));
        
        Route::get('reset', array( 'as' => 'me.reset', 'uses' => 'ResetsController@create' ));
        Route::post('reset', array( 'as' => 'me.reset', 'uses' => 'ResetsController@store' ));
        Route::get('reset/form/{token}', array( 'as' => 'me.reset.form', 'uses' => 'ResetsController@edit' ));
        Route::post('reset/form/{token}', array( 'as' => 'me.reset.form', 'uses' => 'ResetsController@update' ));

        Route::patch('/{id}/contact', array( 'as' => 'me.contact', 'uses' => 'ContactController@update', 'before' => 'auth.contactLogin' ));
        Route::get('/{id}', array( 'as' => 'me', 'uses' => 'ProfileController@show', 'before' => 'auth.contactLogin' ));
        Route::patch('/{id}', array( 'as' => 'me', 'uses' => 'ProfileController@update', 'before' => 'auth.contactLogin' ));
    }
);