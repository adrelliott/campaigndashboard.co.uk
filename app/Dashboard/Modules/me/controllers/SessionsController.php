<?php namespace Dashboard\Me;

use \BaseController;
use Auth, View, Input, Redirect, URL;

class SessionsController extends BaseController
{
    public function create()
    {
        if ( Auth::contactLogin()->check() || Auth::contactLogin()->viaRemember() )
        {
            return Redirect::to(URL::route('me', array( 'id' => Auth::contactLogin()->get()->hash )));
        }
        else
        {
            return View::make('me::sessions/create');
        }
    }

    public function store()
    {
        $credentials = Input::only('email', 'password');
        $remember = (bool)Input::get('remember');

        if ( Auth::contactLogin()->attempt($credentials, $remember) )
            return Redirect::intended(URL::route('me', array( 'id' => Auth::contactLogin()->get()->hash )));

        // Spit you back out if they're wrong
        return Redirect::route('contact_login')
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
        Auth::contactLogin()->logout();
        return Redirect::route('contact_login')
            ->with('info', 'you\'re logged out now!<br>');
    }
}