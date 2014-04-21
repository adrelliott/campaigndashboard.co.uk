<?php namespace Dashboard\Events;

use Event;
use Auth;

class EventHandler {

    /**
     * Stores the prefix of the event name - usually 'Dashboard.{modulename}.'
     * Don't forget the trailing period on the name (this then gives us just 'class.method')
     * you can check this in $this->classAttributes property of the controller
     * @var string
     */
    public $prefix;

    /**
     * Ther event name that is being fired
     * @var string
     */
    public $event;

    /**
     * The main record object. We can manipulate the properties via the event_add(event)     
     * @var object 
     */
    public $record;


    public function __construct()
    {
        $this->prefix = $this->eventPrefix;
        $this->event = Event::firing();
    }

    public function handle($record)
    {
        $this->record = $record;
        $method = camel_case(str_replace('.', '_', str_replace($this->prefix, '', $this->event)));

        // Now check and see a tenant-specific method is defined...
        if ( method_exists($this, $method . Auth::user()->owner_id) ) 
            return $this->{$method . Auth::user()->owner_id}();
        
        // ...if not, then have we got a general method defined?
        elseif ( method_exists($this, $method) ) 
            return $this->$method();
    }

    
}