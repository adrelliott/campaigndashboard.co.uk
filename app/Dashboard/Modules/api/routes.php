<?php namespace Dashboard\Api;

use Route;

// Set up contacts
Route::group(array(
    'prefix' => 'api', 
    'before' => 'auth',
    'namespace' => 'Dashboard\Api'
    ), 
    function()
    {
        /**
         * Gets the order-items for the passed contact
         */
        Route::get('contacts/{id}/order-items', 
            array('as' => 'api.contacts.order-items', 'uses' => 'ApiContactsController@getOrderProducts'));

        /**
         * Gets any related model for the contact (and returns nested relationship cols)
         */
        Route::get('contacts/{id}/{relatedModel}/{nestedRelationship?}', 
            array('as' => 'api.contacts.related-model', 'uses' => 'ApiContactsController@getRelated'));

        /**
         * Sets up the default RESTful endpoints
         */
        Route::resource('contacts', 'ApiContactsController');


        /**
         * Sets up the default RESTful endpoints
         */
        Route::resource('broadcasts', 'ApiBroadcastsController');



        /**
         * Use this to test the eloquent methods - see the method in contacts controller
         */
        Route::get('contacts/test',
            array('uses' => 'ApiContactsController@test'));


    }
);

// Set up notes
Route::group(array(
        'prefix' => 'api',
        'before' => 'auth',
        'namespace' => 'Dashboard\Crm'
    ),
    function()
    {
        /**
         * Sets up the default RESTful endpoints
         */
        Route::resource('notes', 'NotesController');
    }
);




        



        // Route::model('contact', 'Crm\Contact');
        // Route::get('contacts', 
        //     array('as' => 'api.contacts.index'), function(Contact $contact){ return $contact->all() });
        // Route::get('contacts/create', 
        //     array('as' => 'api.contacts.create', 'uses' => 'Crm\ContactsController@create'));
        // Route::post('contacts', 
        //     array('as' => 'api.contacts.store', 'uses' => 'Crm\ContactsController@store'));
        // Route::get('contacts/{id}', 
        //     array('as' => 'api.contacts.show', 'uses' => 'Crm\ContactsController@show'));
        // Route::get('contacts/{id}/edit', 
        //     array('as' => 'api.contacts.edit', 'uses' => 'Crm\ContactsController@edit'));
        // Route::put('contacts/{id}', 
        //     array('as' => 'api.contacts.update', 'uses' => 'Crm\ContactsController@update'));
        // Route::delete('contacts/{id}', 
        //     array('as' => 'api.contacts.destroy', 'uses' => 'Crm\ContactsController@destroy'));
        

         // Route::get('contacts', 
        //     array('as' => 'api.contacts.index', 'uses' => 'Crm\ContactsController@index'));
        // Route::get('contacts/create', 
        //     array('as' => 'api.contacts.create', 'uses' => 'Crm\ContactsController@create'));
        // Route::post('contacts', 
        //     array('as' => 'api.contacts.store', 'uses' => 'Crm\ContactsController@store'));
        // Route::get('contacts/{id}', 
        //     array('as' => 'api.contacts.show', 'uses' => 'Crm\ContactsController@show'));
        // Route::get('contacts/{id}/edit', 
        //     array('as' => 'api.contacts.edit', 'uses' => 'Crm\ContactsController@edit'));
        // Route::put('contacts/{id}', 
        //     array('as' => 'api.contacts.update', 'uses' => 'Crm\ContactsController@update'));
        // Route::delete('contacts/{id}', 
        //     array('as' => 'api.contacts.destroy', 'uses' => 'Crm\ContactsController@destroy'));
        
        

 // Route::get('contacts', 
 //            array('as'=>'api.contacts', 'uses'=> 'ContactsController@index'));
 //        Route::get('contacts/create', 
 //            array('as'=>'api.contacts.create', 'uses'=> 'ContactsController@create'));
 //        Route::post('contacts', 
 //            array('as'=>'api.contacts.store', 'uses'=> 'ContactsController@store'));
 //        Route::get('contacts/{id}', 
 //            array('as'=>'api.contacts.show', 'uses'=> 'ContactsController@index'));
 //        Route::get('contacts', 
 //            array('as'=>'api.contacts', 'uses'=> 'ContactsController@index'));
 //        Route::get('contacts', 
 //            array('as'=>'api.contacts', 'uses'=> 'ContactsController@index'));
