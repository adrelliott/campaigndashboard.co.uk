<?php namespace Dashboard\Composers;

use Dashboard\Composers\Composer;
use App, Auth, Request, stdClass, Config;

class AppComposer extends Composer {

    protected $user;

    /**
     * Bind $user to the view
     * @param  string $view The view to bind the user to
     */
    public function compose($view)
    {
        //Set up the current user
        $view->with('current_user', $this->setUser());
        $view->with('owner_id', $this->user->owner_id);

        // Set up the Config
        $view->with('config', $this->setConfig());

        // Set up the navbar & logos
        $view->with('navbar',  $this->user->config['navbar']); 
        $view->with('logos',  $this->user->config['logos']);

        // Set up other useful vars required
        $view->with('controller', strtolower(Request::segment(2)));
        $view->with('environment', App::environment());

        // Temp
        // $view->with('dashboard',  $this->user);        
    }

    public function setUser()
    {
        $this->user = Auth::user()->user();
        $this->user['admin_level'] = Auth::user()->user()->admin_level;

        return $this->user;
    }

    public function setConfig()
    {
        $this->user->config = Config::get('client_config/' . $this->user->owner_id);
        return $this->user->config;
    }


}