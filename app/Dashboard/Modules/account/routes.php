<?php namespace Dashboard\Account;

use Route, View;

Route::group(array(
    'prefix' => 'app',
    'namespace' => 'Dashboard\Account',
    ),
    function()
    {
        Route::get('account',  array('as' => 'app.account.show', 'uses' => 'AccountController@index'));
        Route::patch('account',  array('as' => 'app.account.update', 'uses' => 'AccountController@index'));
    }
);

