<?php namespace Dashboard\Crm\Mailchimp;

use Dashboard\Crm\EmailListsInterface;
use Mailchimp;


class EmailLists implements EmailListsInterface {

    /**
     * Object to hold our MailChimp object
     * @var obj
     */
    protected $mailchimp;

    /**
     * This list Id to subscribe this to
     * @var string
     */
    protected $listId;


    public function __construct(Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

    public function subscribeTo($contactModel, $listName = 'default')
    {
        $retval = FALSE;

        
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

    public function verifyData($contactModel, $list)
    {
        # Is there a valid email?
        
        # Is the contact one of the tenant's contacts?
        
        # Is the list name one of the tenant's lists?
    }

    public function unsubscribeFrom($listId, $contact)
    {
        // unsubscribe from
    }

    public function getListId($listName)
    {
        // get lists from config
        // 
        // if it exists, return it, else return false
        // Config::get();
        return 'b5d5f34e57';
    }

}