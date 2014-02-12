<?php namespace Dallasmatthews\Crm;

use Illuminate\Support\ServiceProvider;

class CrmServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('crm', 'Dallasmatthews\Crm\CrmService');
    }
}