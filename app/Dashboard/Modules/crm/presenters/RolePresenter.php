<?php namespace Dashboard\Crm;

// use McCool\LaravelAutoPresenter\BasePresenter;
use Dashboard\Presenters\Presenter;
use Dashboard\Crm\ContactRole as Model;
use Carbon;

class RolePresenter extends Presenter {

     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

    
    public function created_at()
    {
        return $this->resource->created_at->toDayDateTimeString();
    }

    

    
}