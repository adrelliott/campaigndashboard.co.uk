<?php namespace Dashboard\Dashboard;

use Route;

Route::get('app/dashboard', array(
    'before' => 'auth',
    'as' => 'dashboard', 
    'uses' => 'Dashboard\Dashboard\DashboardController@index'
    )
);