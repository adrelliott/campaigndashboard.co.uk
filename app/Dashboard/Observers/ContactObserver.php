<?php namespace Dashboard\Observers;

use \Dashboard\Crm\Contact;
use \Dashboard\Me\ContactLogin;
use \Dashboard\Mailers\ContactLoginMailer;

/**
 * The ContactObserver handles the code surrounding the creation of a new
 * contact login when a contact is created / updated
 */
class ContactObserver
{
    public function created(Contact $contact)
    {
        // Generate a new password
        $password = substr(sha1(microtime().rand(0,1000)), 0, 7);

        // Create a new login associated with the contact and save it
        $login = new ContactLogin;
        $login->fill(array(
            'email' => $contact->email,
            'password' => $password,
            'password_confirmation' => $password,
            'hash' => sha1(microtime().rand(0,1000)),
            'authenticate_salt' => sha1(microtime().rand(0,1000))
        ));
        
        $login->contact_id = $contact->id;
        $login->owner_id = $contact->owner_id;

        $login->save();

        // Send the user an email with their new password
        // $mailer = new ContactLoginMailer;
        // $mailer->newUser($contact, $contact->login, $password);
    }

    public function updated(Contact $contact)
    {
//        $contact->login->update(array(
//            'email' => $contact->email
//        ));
    }
}