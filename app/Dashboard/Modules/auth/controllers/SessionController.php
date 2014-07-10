<?php namespace Dashboard\Auth;

use Dashboard\Admin\User;
use Controller, View, Redirect, Session, Input, Auth, Event;

class SessionController extends Controller {

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // If the user is already logged in, send them to the dashboard
        if ( Auth::user()->check() ) return Redirect::to('/app/dashboard');

        // If the cookie is set, then send them to intended route or dashboard
        if ( Auth::user()->viaRemember() )
        {
            return Redirect::intended('/app/dashboard');  
        } 

        // Otherwise make them log in again
        else return View::make('auth::login');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Set up the credentials to pass to Auth::user()->attempt()
        $credentials = Input::only('email', 'password');
        $credentials['active'] = 1;
        $remember = (bool)Input::get('remember');

        // Attempt login
        if ( Auth::user()->attempt($credentials, $remember) )    //remember them if checked
            return Redirect::intended('/app/dashboard');

        // Spit you back out if they're wrong
        return Redirect::route('login')
            ->with('error', '<strong>Couldn\'t log you in.</strong><br>Are you <em>sure</em> those details are right? (Call 0161 883 2244 for help)');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::user()->logout();
        return Redirect::route('login')
            ->with('info', 'you\'re logged out now!<br>');
	}

}
