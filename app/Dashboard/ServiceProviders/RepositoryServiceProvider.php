<?php namespace Dashboard\ServiceProviders; 

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    /**
     * This class simply sets up the repos for each model
     */

    public function register()
    {
        
        // Bind the Admin Interfaces
        $this->app->bind(
            'Dashboard\Repositories\UserRepositoryInterface',
            'Dashboard\Repositories\EloquentUserRepository'
            // 'Dashboard\Repositories\FileContactRepository'
        );


        // Bind the Api Interfaces
        $this->app->bind(
            'Dashboard\Api\Repositories\BroadcastApiRepositoryInterface',
            'Dashboard\Api\Repositories\EloquentApiBroadcastRepository'
        );
        $this->app->bind(
            'Dashboard\Api\Repositories\ContactApiRepositoryInterface',
            'Dashboard\Api\Repositories\EloquentApiContactRepository'
        );
        $this->app->bind(
            'Dashboard\Api\Repositories\OrderApiRepositoryInterface',
            'Dashboard\Api\Repositories\EloquentApiOrderRepository'
        );

         // Bind the Broadcast Interfaces
        $this->app->bind(
            'Dashboard\Repositories\BroadcastRepositoryInterface',
            'Dashboard\Repositories\EloquentBroadcastRepository'
            // 'Dashboard\Repositories\FileContactRepository'
        );

         // Bind the Crm Interfaces
        $this->app->bind(
            'Dashboard\Repositories\ContactRepositoryInterface',
            'Dashboard\Repositories\EloquentContactRepository'
            // 'Dashboard\Repositories\FileContactRepository'
        );

        // Bind the Sales Interfaces
        $this->app->bind(
            'Dashboard\Repositories\OrderRepositoryInterface',
            'Dashboard\Repositories\EloquentOrderRepository'
            // 'Dashboard\Repositories\FileContactRepository'
        );
        $this->app->bind(
            'Dashboard\Repositories\OrderProductRepositoryInterface',
            'Dashboard\Repositories\EloquentOrderProductRepository'
            // 'Dashboard\Repositories\FileContactRepository'
        );




    }
}