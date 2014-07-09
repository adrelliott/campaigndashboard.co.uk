<?php namespace Dashboard\Account;

use Route, View;

Route::group(array(
    'prefix' => 'app',
    'namespace' => 'Dashboard\Account',
    'before' => 'auth',
    ),
    function()
    {
        Route::get('account',  array('as' => 'app.account.showOne', 'uses' => 'AccountController@showOne'));
        Route::patch('account',  array('as' => 'app.account.updateOne', 'uses' => 'AccountController@updateOne'));
    }
);

