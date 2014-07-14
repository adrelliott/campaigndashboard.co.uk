<?php namespace Dashboard\Me;

class ResetsController extends BaseController 
{
    public function create() {}

    public function store()
    {
        // Check the user exists
        $email = Input::get('email');
        $login = ContactLogin::where('email', '=', $email)
            ->first();

        if ($login)
        {
            $mailer = new ContactLoginMailer;
            $mailer->newUser($contact, $contact->login, $password);
        }
        else
        {
            // ...
        }
    }
}