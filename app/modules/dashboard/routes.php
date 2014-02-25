<?php 

// Set up namespace
namespace Dashboard\Home;
use Route;

Route::get('app/dashboard', array(
    'before' => 'auth',
    'as' => 'dashboard', 
    'uses' => 'Dashboard\Home\DashboardController@index'
    )
);