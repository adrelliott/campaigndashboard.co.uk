<?php namespace Dashboard\ServiceProviders; 

use Illuminate\Support\ServiceProvider;

class ListServiceProvider extends ServiceProvider {

    /**
     * Bind the listInterface to the appropriate broadcast module (usually Mailchimp)
     */

    public function register()
    {
        
        // Bind the Admin Interfaces
        $this->app->bind(
            'Dashboard\Crm\ListInterface',
            'Dashboard\Crm\Mailchimp\BroadcastList'
        );
    }
}