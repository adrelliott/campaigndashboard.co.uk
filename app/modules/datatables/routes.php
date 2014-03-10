<?php namespace Dashboard\Datatables;

use Route;

Route::group(array(
    'prefix' => 'dt', 
    'before' => 'auth',
    'namespace' => 'Dashboard'
    ), 
    function()
    {
        // Contacts
        Route::get('contacts', 'Crm\ContactsController@getAll');
        // We can also extend that controller and add new methods:
        // Route::get('contacts/getAll', 'Datatables\ContactsController@getAll');

        // Orders
        Route::get('orders', 'Sales\OrdersController@getAll');
        Route::get('orders/getFor', 'Sales\OrdersController@getFor');
        Route::get('orderproducts', 'Sales\OrderProductsController@getAll');
        Route::get('orderproducts/getFor', 'Sales\OrderProductsController@getFor');

        // Leads
        Route::get('leads', 'Crm\LeadsController@getAll');
    }
);
