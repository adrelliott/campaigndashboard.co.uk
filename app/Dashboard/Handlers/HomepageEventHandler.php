<?php namespace Dashboard\Handler;

use Dashboard\Events\EventHandler;

class HomepageEventHandler extends EventHandler {

    private $eventPrefix = 'dashboard.homepage.';

    public function __construct()
    {
        $this->prefix = $this->eventPrefix;;
    }

    
    public function homepageIndex()
    {
        dd('event fired: index');
    }

}