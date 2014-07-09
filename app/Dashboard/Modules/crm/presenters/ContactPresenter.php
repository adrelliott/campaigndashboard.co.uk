<?php namespace Dashboard\Crm;

// use McCool\LaravelAutoPresenter\BasePresenter;
use Dashboard\Presenters\Presenter;
use Dashboard\Crm\Contact as Model;
use Carbon;

class ContactPresenter extends Presenter {

    public function __construct(Model $model)
    {
        $this->resource = $model;
        dd('contact_presenter called');
    }

    public function fullName()
    {
        //Do we have first name?
        if ( isset($this->resource->first_name) )
            return 'This is ' . $this->resource->first_name . ' ' . $this->resource->last_name;
        
        //if not, do we have title?
        if ( isset($this->resource->title) )
            return 'This is ' . $this->resource->title . ' ' . $this->resource->last_name;
        
        //If not, put 
        return 'You only know this contact by their surname (' . $this->resource->last_name . ')';
    }

    public function created_at()
    {
        return $this->resource->created_at->diffForHumans();
    }

    public function tags()
    {
         $cols = array('tag_name', 'variant', 'tag_note');
         return $this->resource->tags()->get($cols)->toArray();
    }


    
}