<?php
namespace Dashboard\Auth;

use Dashboard\Admin\User;
use BaseController, View, Redirect, Session, Input, Auth;

class SessionController extends BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('auth::login');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Create the credentials
        $credentials = Input::only('email', 'password');

        // Attempt login
        if ( Auth::attempt($credentials) )
            return Redirect::intended('/app/dashboard');
            // ->with('success', 'You\'re logged in!');

        // Spit you back out if they're wrong
        return Redirect::route('login')
            ->with('error', '<strong>Couldn\'t log you in.</strong><br>Are you <em>sure</em> those details are right?');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
        return Redirect::route('login')
            ->with('info', 'you\'re logged out now.<br>(<em>Go and treat yourself to some cake.</em>)');
	}

}
