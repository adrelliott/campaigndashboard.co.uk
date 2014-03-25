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

// Note = why don;t we create a datatables output class in the Eloquent respoitary, and if we pass contact_id= then constrain by contact using scopeByContact()? 
// 
// also where shjuld this logic go? should we have a search class????


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
