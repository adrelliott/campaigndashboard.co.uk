<?php

use Dashboard\Me\ContactLogin;

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
    if (Auth::user()->guest())
    {
        if (Request::ajax())
            return '<h3>Session Expired!</h3><p>Please refresh the page to log in again</p>';
        
        else 
            return Redirect::guest('app/login')->with('error', 'You don\'t seem to be logged in.');
    }
});

Route::filter('auth.contactLogin', function()
{
    // Check to see if we're already logged in, and grab the attempted user from the hash in the URL
    $loggedIn = ! Auth::contactLogin()->guest();
    $contactLogin = ContactLogin::where('hash', '=', Request::segment(2))->firstOrFail();
    
    // If we're not logged in yet but we have a ?login= query string parameter...
    if ( !$loggedIn && Input::get('login') )
    {
        // ...try running our signature against the model to see if we can authenticate that way
        $loggedIn = ContactLogin::authenticateFromSignature( $contactLogin, Request::query('login') );

        // If that worked, set up the login session (i.e. force a log in)
        if ( $loggedIn )
            Auth::contactLogin()->login($contactLogin);
    }

    // If it didn't work, get the hell outta there
    if ( !$loggedIn )
        return Redirect::guest(URL::route('me.contact_login'))
            ->with('error', 'You don\'t seem to be logged in.');
});

Route::filter('auth.basic', function()
{
	return Auth::user()->basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::user()->check()) return Redirect::to('/app');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});