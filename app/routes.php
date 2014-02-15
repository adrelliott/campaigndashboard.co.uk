<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// Routes for the public-facing website
// Route::group(array(
//     'prefix' => 'site', 
//     ), 
    
// );


// Dashboard (index)
Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@index')); 


// CRM Routes
Route::group(array(
    'prefix' => 'crm', 
    // 'before' => 'auth'
    ), 
    function()
    {
        Route::resource('contacts', 'ContactsController');   
    }
);




Route::get('/ajax/contacts', function(){
    return Contact::getAllContacts();
});


