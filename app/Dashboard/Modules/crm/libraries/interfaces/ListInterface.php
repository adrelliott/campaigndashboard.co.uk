<?php namespace Dashboard\Crm;

// The interface for managing the list (to start with we'll be using MailChimp)
// 
use Dashboard\Crm\Contact;

class ListInterface {

    /**
     * Subscribes a contact to a list
     * @param  string  $listId  Usually the identifying ID of the list in provider (e.g. Mailchimp) 
     * @param  Contact $contact The contact model
     * @return bool           TRUE/FALSE
     */
    public function subscribeTo($listId, Contact $contact) { }


    /**
     * Unsubscribes a contact from a list
     * @param  string  $listId  Usually the identifying ID of the list in provider (e.g. Mailchimp) 
     * @param  Contact $contact The contact model
     * @return bool           TRUE/FALSE
     */
    public function unsubscribeFrom($listId, Contact $contact) { }
}