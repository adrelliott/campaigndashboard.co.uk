<?php namespace Dashboard\Events;

use Event;

class EventHandler {

    public $prefix;

    public function __construct()
    {
        $this->prefix = $this->eventPrefix;;
    }

    public function handle()
    {
        $event = Event::firing();
        $method = camel_case(str_replace('.', '_', str_replace($this->prefix, '', $event)));
        if ( method_exists($this, $method) ) return $this->$method();
    }
}