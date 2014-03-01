<?php namespace Dashboard\Api;

use \Route;

// Resource
Route::group(array(
    'prefix' => 'api/v1',
    'namespace' => 'Dashboard\Api', 
    'before' => 'auth.basic',
    ), 
    function()
    {
        Route::resource('contacts', 'ContactsController');
        // Route::get('dataTables', array('as' => 'dataTables', 'uses' => 'ContactsController@indexDatatables'));
    }
);

// Route::group(array(
//     'prefix' => 'api/v1',
//     'namespace' => 'Dashboard\Api\v1', 
//     'before' => 'auth.basic',
//     )
//     function()
//     {
//         get('contacts')
//     }
// );