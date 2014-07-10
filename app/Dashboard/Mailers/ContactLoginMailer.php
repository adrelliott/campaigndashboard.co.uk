<?php namespace Dashboard\Mailers;

use Dashboard\Crm\Contact;
use Dashboard\Me\ContactLogin;

class ContactLoginMailer extends BaseMailer
{
    public function newUser($message, Contact $contact, ContactLogin $login, string $password)
    {
        $message->to($login->email);
        $message->subject('Your Password - CampaignDashboard.co.uk');
    }
}