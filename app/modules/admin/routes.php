<?php 

// Set up namespace
namespace Dashboard\Admin;
use Route;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Admin', 
    'before' => 'auth' //Also, are they an admin?
    ), 
    function()
    {
        Route::resource('users', 'UsersController');
    }
);
