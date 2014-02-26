<?php namespace Dashboard\ServiceProviders; 

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    public function register()
    {
        
        // Bind the Crm Interfaces
        $this->app->bind(
            'Dashboard\Repositories\ContactRepositoryInterface',
            'Dashboard\Repositories\EloquentContactRepository'
            // 'Dashboard\Repositories\FileContactRepository'
        );
    }
}