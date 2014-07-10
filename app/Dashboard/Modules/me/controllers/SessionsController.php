<?php namespace Dashboard\Me;

use \BaseController;
use Auth, View;

class SessionsController extends BaseController
{
    public function create()
    {
        if ( Auth::clientLogin()->check() || Auth::clientLogin()->viaRemember() )
        {
            return Redirect::to(URL::route('me', array( 'id' => Auth::clientLogin()->hash )));
        }
        else
        {
            return View::make('me::sessions/create');
        }
    }
}