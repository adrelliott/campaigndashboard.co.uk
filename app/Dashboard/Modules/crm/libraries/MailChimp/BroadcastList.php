<?php namespace Dashboard\Crm\Mailchimp;

use Dashboard\Crm\ListInterface;
use Mailchimp;


class BroadcastList implements ListInterface {

    /**
     * Object to hold our MailChimp object
     * @var obj
     */
    protected $mailchimp;

    /**
     * An array of lists for this tenant
     * @var array
     */
    // protected $lists;


    public function __construct(Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

    public function subscribeTo($contactModel, $listName = 'default')
    {
        
        $retval = $this->mailchimp->lists->subscribe(
                $this->getListId($listName),    //List Id
                array('email' => $contactModel->email),   //Email address
                null,   //Merge Vars
                'html', //Email type (HTML or Plain text)
                false,  //Double opt in?
                true   //Update existing contact if found?
            );
        dump($retval);
        #
         
    }

    public function unsubscribeFrom($listId, $contact)
    {
        // unsubscribe from
    }

    public function getListId($listName)
    {
        // get lists from config
        // Config::get();
        return 'b5d5f34e57';
    }

}