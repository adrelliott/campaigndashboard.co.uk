<?php namespace Dashboard\Search;

use Route, App;

Route::group(array(
    'prefix' => 'app',
    'namespace' => 'Dashboard\Search', 
    'before' => 'auth'
    ),
    function()
    {
        Route::get('search', array( 'uses' => 'SearchController@index', 'as' => 'app.search' ));
        Route::post('search', array( 'uses' => 'SearchController@search', 'as' => 'app.search.process' ));
    }
);