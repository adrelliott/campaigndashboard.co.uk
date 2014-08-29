<?php namespace Dashboard\Me;

use View, Input, Password, Redirect, BaseController, DB, Hash, App;

class ResetsController extends BaseController
{
    public function create()
    {
        return View::make('me::resets/create');
    }

    public function edit($token)
    {
        $email = DB::table('password_reminders')->select('email')->where([ 'token' => $token, 'type' => 'contactLogin' ])->first();
        if (is_null($token) || is_null($email)) App::abort(404);

        return View::make('me::resets/edit')
            ->withToken($token)
            ->withEmail($email->email);
    }

    public function store()
    {
        switch (Password::contactLogin()->remind(Input::only('email'), function($message){ $message->subject('CampaignDashboard.co.uk – Password Reminder'); }))
        {
            case Password::INVALID_USER:
                return Redirect::route('me.reset')
                    ->withInput()
                    ->withError('We couldn\'t find your email address – please double-check and try again');

            case Password::REMINDER_SENT:
                return Redirect::route('me.reset')
                    ->withSuccess('Okay, we\'ve emailed you a link to reset your password. Please check your email now.');
        }
    }

    public function update($token)
    {
        $credentials = Input::only( 'email', 'password', 'password_confirmation', 'token' );

        $response = Password::contactLogin()->reset($credentials, function($user, $password)
        {
            $user->password = $password;
            $user->save();
        });

        switch ($response)
        {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
               return Redirect::back()->withError('There was a problem! Please try again. (' . $response . ')');

            case Password::PASSWORD_RESET:
                return Redirect::route('me.contact_login');
        }
    }
}