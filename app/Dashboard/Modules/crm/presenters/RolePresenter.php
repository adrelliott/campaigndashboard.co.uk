<?php namespace Dashboard\Crm;

use McCool\LaravelAutoPresenter\BasePresenter as Presenter;
use Dashboard\Crm\Role as Model;
use Carbon;

class RolePresenter extends Presenter {

    public function __construct(Model $model)
    {
        $this->resource = $model;
    }

    
    public function created_at()
    {
        return $this->resource->created_at->toDayDateTimeString();
    }

    

    
}