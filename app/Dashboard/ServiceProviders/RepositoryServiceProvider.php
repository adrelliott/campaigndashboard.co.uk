<?php namespace Dashboard\ServiceProviders; 

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    /**
     * This class simply sets up the repos for each model
     */

    public function register()
    {
        
        // Bind the Crm Interfaces
        $this->app->bind(
            'Dashboard\Repositories\ContactRepositoryInterface',
            'Dashboard\Repositories\EloquentContactRepository'
            // 'Dashboard\Repositories\FileContactRepository'
        );


        // Bind the Admin Interfaces
        $this->app->bind(
            'Dashboard\Repositories\UserRepositoryInterface',
            'Dashboard\Repositories\EloquentUserRepository'
            // 'Dashboard\Repositories\FileContactRepository'
        );


        // Bind the Api Interfaces
        $this->app->bind(
            'Dashboard\Api\Repositories\ContactApiRepositoryInterface',
            'Dashboard\Api\Repositories\EloquentApiContactRepository'
        );
    }
}