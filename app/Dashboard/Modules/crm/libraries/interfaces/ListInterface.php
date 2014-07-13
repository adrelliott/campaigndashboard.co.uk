<?php namespace Dashboard\Crm;

interface ListInterface {

    /**
     * Subscribes a contact to a list
     * @param  string  $listId  Usually the identifying ID of the list in provider (e.g. Mailchimp) 
     * @param  Contact $contact The contact model
     * @return bool           TRUE/FALSE
     */
    public function subscribeTo($listId, $contact);


    /**
     * Unsubscribes a contact from a list
     * @param  string  $listId  Usually the identifying ID of the list in provider (e.g. Mailchimp) 
     * @param  Contact $contact The contact model
     * @return bool           TRUE/FALSE
     */
    public function unsubscribeFrom($listId, $contact);
}