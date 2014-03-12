<?php namespace Dashboard\Datatables;

use Route;

Route::group(array(
    'prefix' => 'dt', 
    'before' => 'auth',
    'namespace' => 'Dashboard'
    ), 
    function()
    {
        // Most times, the route will map to the main controller (that extends BaseController)
        // However, we can also extend that controller and add new methods:
        // e.g. Route::get('contacts', '***Datatables****\ContactsController@getAll');


        // Contacts
        Route::get('contacts', 'Crm\ContactsController@getAll');
        Route::get('notes', 'Crm\NotesController@getAll');
        Route::get('notes/getFor', 'Crm\NotesController@getFor');
        Route::get('roles', 'Crm\RolesController@getAll');
        Route::get('roles/getFor', 'Crm\RolesController@getFor');
        
        // Orders
        Route::get('orders', 'Sales\OrdersController@getAll');
        Route::get('orders/getFor', 'Sales\OrdersController@getFor');
        Route::get('orderproducts', 'Sales\OrderProductsController@getAll');
        Route::get('orderproducts/getFor', 'Sales\OrderProductsController@getFor');

        // Leads
        Route::get('leads', 'Crm\LeadsController@getAll');
    }
);
