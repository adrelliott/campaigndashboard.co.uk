<?php 

// Set up namespace
namespace Dashboard\App\Home;
use \Route;

// Route::get('app/dashboard', array('as' => 'dashboard', function() {
//     return 'This si the dashbard';
//     })
// );

Route::get('app/dashboard', array(
    'as' => 'dashboard', 
    'uses' => 'Dashboard\App\Home\DashboardController@index'
    )
);

// Route::get('/app', array(
//     'before' => 'auth',
//     'as' => 'dashboard',
//     'namespace' => 'Dashboard\App',
//     'uses' => 'Dashboard\App\DashboardController@index',
//     ));

