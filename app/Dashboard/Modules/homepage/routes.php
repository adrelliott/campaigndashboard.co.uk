<?php namespace Dashboard\Homepage;

use Route;

Route::get('app/dashboard', array(
    'before' => 'auth',
    'as' => 'dashboard', 
    'uses' => 'Dashboard\Homepage\HomepageController@index'
    )
);