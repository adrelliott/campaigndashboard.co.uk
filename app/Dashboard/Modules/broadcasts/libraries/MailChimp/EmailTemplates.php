<?php namespace Dashboard\Broadcasts\Mailchimp;

use Dashboard\Broadcasts\EmailTemplatesInterface;
use Mailchimp;

class EmailTemplates implements EmailTemplatesInterface {

    /**
     * Object to hold our MailChimp object
     * @var obj
     */
    protected $mailchimp;


    public function __construct(Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }


    public function listTemplates($templateIds = array())
    {
        $templates = $this->mailchimp->templates->getList();

        return $templates['user'];
    }
}