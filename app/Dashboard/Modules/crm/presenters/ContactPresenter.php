<?php namespace Dashboard\Crm;

use McCool\LaravelAutoPresenter\BasePresenter as Presenter;
use Dashboard\Crm\Contact as Model;
use Carbon;

class ContactPresenter extends Presenter {

    public function __construct(Model $model)
    {
        $this->resource = $model;
    }

    public function fullName()
    {
        //Do we have first name?
        if ( isset($this->resource->first_name) )
            return 'This is ' . $this->resource->first_name . ' ' . $this->resource->last_name;
        
        //if not, do we have title?
        if ( isset($this->resource->title) )
            return 'This is ' . $this->resource->title . ' ' . $this->resource->last_name;
        
        //If not, tell them... 
        return 'You only know this contact by their surname (' . $this->resource->last_name . ')';
    }

    public function created_at()
    {
        return $this->resource->created_at->diffForHumans();
    }

    

    
}