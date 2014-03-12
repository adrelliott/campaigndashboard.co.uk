<?php namespace Dashboard\Composers;

use Dashboard\Composers\Composer;

class AppComposer extends Composer {

    /**
     * Bind $user to the view
     * @param  string $view The view to bind the user to
     */
    public function compose($view)
    {
        //Set up the current user
        $view->with('current_user', $this->dashboard->user);
        $view->with('owner_id', $this->dashboard->owner_id);

        // Set up the Config
        $view->with('config', $this->dashboard->config);

        // Set up the navbar & logos
        $view->with('navbar',  $this->dashboard->config['navbar']); 
        $view->with('logos',  $this->dashboard->config['logos']);

        // Set up other useful vars required
        $view->with('controller', $this->dashboard->misc['controller']);
        $view->with('environment', $this->dashboard->misc['environment']);

        // Temp
        $view->with('dashboard',  $this->dashboard);        
    }

}