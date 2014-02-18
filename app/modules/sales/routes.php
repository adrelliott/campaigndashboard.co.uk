<?php 

// Set up namespace
namespace Dashboard\App\Sales;
use \Route;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\App\Sales', 
    'before' => 'auth'
    ), 
    function()
    {
        Route::resource('orders', 'OrdersController');
        Route::resource('products', 'ProductsController');
        Route::resource('leads', 'LeadsController');
    }
);
