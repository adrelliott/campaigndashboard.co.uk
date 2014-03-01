<?php namespace Dashboard\Sales;

use \Route;

// Contacts
Route::group(array(
    'prefix' => 'app', 
    'namespace' => 'Dashboard\Sales', 
    'before' => 'auth'
    ), 
    function()
    {
        Route::resource('orders', 'OrdersController');
        Route::resource('products', 'ProductsController');
        Route::resource('leads', 'LeadsController');
    }
);
