<?php namespace Dashboard\Composers;

// use Dashboard\Repositories\Config\BaseConfig;
use Auth, Config;
use Dashboard\Composers\Composer;

class ConfigComposer extends Composer {


    public function getCustomConfig()
    {
        // Don't forget to change the path to defaultcxomposer in getConfig() in Composer.php
        
        
    }

    /**
     * Bind $user to the view
     * @param  string $view The view to bind the user to
     */
    public function compose($view)
    {
        // Set up the Config
        $view->with('config', $this->dashboard->config);

        // Set up the navbar
        $view->with('navbar',  $this->dashboard->config['navbar']); 

        // Set up the logos 
        $view->with('logos',  $this->dashboard->config['logos']);
    }

}