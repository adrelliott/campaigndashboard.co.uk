<?php 

// Set up namespace
namespace Dashboard\App\Admin;
use \Route;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\App\Admin', 
    'before' => 'auth' //Also, are they an admin?
    ), 
    function()
    {
        Route::resource('users', 'UsersController');
    }
);
