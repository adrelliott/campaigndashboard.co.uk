<?php namespace Dashboard\Tags;

use Route, App;

// Tags
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Tags', 
    'before' => 'auth'
    ), 
    function()
    {
         Route::resource('tags', 'TagsController');
    }
);