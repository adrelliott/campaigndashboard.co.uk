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

Route::resource('contacts', 'ContactsController');
Route::get('/', array('as' => 'dashboard', 'uses' => 'DashboardController'));


//Route::controller('contacts', 'ContactsController');



// Route::get('contacts/{id?}/edit', array( 
//     'as' => 'contacts/show/' . $id, //see page 3299 in kindle
//     function()
//     {
//         if ($id == null) return Redirect::route('contacts')->with('message', 'Oops. No contact found with that id (' . $id . ')');

//         $data = array('owner_id' => 10222, 'id' => $id);
//         // return View::make('index', $data)->nest('child', 'child.index', $data);
//         return View::make('contacts.show', $data);
//     }
// ));



Route::resource('contactactions', 'ContactactionsController');