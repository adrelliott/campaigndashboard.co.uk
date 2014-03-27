<?php namespace Dashboard\Handler;

use Mail;
use Dashboard\Events\EventHandler;

class CrmEventHandler extends EventHandler {

    private $eventPrefix = 'dashboard.crm.';

    public function __construct()
    {
        $this->prefix = $this->eventPrefix;;
    }


    // public function contactsEdit()
    // {
    //     dd('event fired: contact.edit');
    // }

}