<?php namespace Dashboard\Handler;

use Mail;
use Dashboard\Events\EventHandler;

class CrmEventHandler extends EventHandler {

    /**
     * Set the prefix of these events
     * @var string
     */
    protected $eventPrefix = 'dashboard.crm.';

}