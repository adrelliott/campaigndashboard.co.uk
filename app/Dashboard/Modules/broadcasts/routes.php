<?php namespace Dashboard\Broadcasts;
use Route;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Broadcasts', 
    'before' => 'auth'
    ), 
    function()
    {
        Route::get('broadcasts/templates/list', array('uses' => 'TemplatesController@listTemplates'));
        Route::get('templates/sync', array('uses' => 'TemplatesController@syncTemplates'));

        // Broadcasts route
        Route::resource('broadcasts', 'BroadcastsController');
        
        // Templates route
        Route::resource('templates', 'TemplatesController');
        
    }
);
