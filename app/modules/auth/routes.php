<?php 

namespace Auth;

\Route::get('app/login', function(){
    return 'Hello from closure';
});


// \Route::get('app/logout', array('as' => 'logout', 'uses' => 'DashboardApp\Auth\AuthController@getLogin')); 
\Route::get('app/logout', array('as' => 'logout', 'uses' => 'Dashboard\App\Auth\AuthController@getLogin')); 