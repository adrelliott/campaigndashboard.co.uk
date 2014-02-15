<?php 

namespace Dashboard\App\Dashboard;

\Route::get('app/dashboard', array('as' => 'dashboard', 'uses' => 'Dashboard\App\Dashboard\DashboardController@index')); 
