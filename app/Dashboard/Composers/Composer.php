<?php namespace Dashboard\Composers;

use App, Auth, Request, stdClass, Config;

class Composer {

    /**
     * Contains details of the app 
     * @var obj
     */
    protected $dashboard;

    /**
     * Set up $this->user
     */
    public function __construct()
    {
        $this->dashboard = new stdClass();
        $this->setUser();
        $this->setOwnerId();
        $this->setConfig();
        $this->setMisc();
    }

    public function setUser()
    {
        $this->dashboard->user = Auth::user();
        $this->dashboard->user['admin_level'] = Auth::user()->admin_level;
    }

    public function setOwnerId()
    {
        $this->dashboard->owner_id = Auth::user()->owner_id;
    }

    public function setConfig()
    {
        $this->dashboard->config = Config::get('client_config/' . $this->dashboard->owner_id);
    }

    public function setMisc()
    {
        $this->dashboard->misc = array(
            'controller' => strtolower(Request::segment(2)),
            'environment' => App::environment()
        );
    }

    
}