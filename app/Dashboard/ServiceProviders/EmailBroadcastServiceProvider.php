<?php namespace Dashboard\ServiceProviders; 

use Illuminate\Support\ServiceProvider;

class EmailBroadcastServiceProvider extends ServiceProvider {

    /**
     * Handles all the bindings for the Broadcast mechanism (usually MailChimp)
     */

    public function register()
    {
        
        // Bind the List Interface (for all Mailing lists)
        $this->app->bind(
            'Dashboard\Crm\EmailListsInterface',
            'Dashboard\Crm\Mailchimp\EmailLists'
        );
        
        // Bind the Template interfaces (for email templates)
        $this->app->bind(
            'Dashboard\Broadcasts\EmailTemplatesInterface',
            'Dashboard\Broadcasts\Mailchimp\EmailTemplates'
        );


    }
}