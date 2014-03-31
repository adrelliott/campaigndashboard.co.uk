<?php namespace Dashboard\Handler;

use Dashboard\Events\EventHandler;

class HomepageEventHandler extends EventHandler {

    protected $eventPrefix = 'dashboard.homepage.'; 
    
    public function homepageIndex()
    {
        // dd('event fired: dashboard indexindex');
    }

}