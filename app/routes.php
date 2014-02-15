<?php


// Routes for the public-facing website
// Route::group(array(
//     'prefix' => 'site', 
//     ), 
    
// );


// Dashboard (index)



// CRM Routes
// Route::group(array(
//     'prefix' => 'crm', 
//     // 'before' => 'auth'
//     ), 
//     function()
//     {
//         Route::resource('contacts', 'ContactsController');   
//     }
// );




Route::get('/ajax/contacts', function(){
    return Contact::getAllContacts();
});


