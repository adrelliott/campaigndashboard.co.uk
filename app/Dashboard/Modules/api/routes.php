<?php namespace Dashboard\Api;

use Route;
use Dashboard\Repositories\ContactRepositoryInterface;


// Route::bind('contact', function($value, $route)
// {
//     return ContactInterface::where('name', $value)->first();
// });

// Route::get('api/c/{id}', function($id)
// {
    
//     dump( Contact::findOrFail($id)->tags->toArray() );
// });
// Route::model('contact', 'Dashboard\Crm\Contact');

// Route::model('contact', 'Dashboard\Crm\Contact');

// Set up contacts
Route::group(array(
    'prefix' => 'api', 
    'before' => 'auth',
    'namespace' => 'Dashboard\Crm'
    ), 
    function($repo)
    {
        
        

        // // Standard CRUD endpoints
        // Route::get('/', function()
        // {
        //     return Contact::onlyOwners()->get();
        // });
        
        // Route::get('/{contact}', function($contact)
        // {
        //     return $contact;
        // });

        // Custom endpoints
        Route::get('contacts/{id}/order-items', 
            array('as' => 'api.contacts.order-items', 'uses' => 'ContactsController@getOrderProducts'));

        Route::get('contacts/{id}/{relatedModel}', 
            array('as' => 'api.contacts.related-model', 'uses' => 'ContactsController@getRelated'));
        
        // Default endpoints
        Route::resource('contacts', 'ContactsController');

        



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


    }
);
