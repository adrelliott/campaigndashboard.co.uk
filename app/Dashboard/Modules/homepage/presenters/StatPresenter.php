<?php namespace Dashboard\Homepage;

use Dashboard\Presenters\Presenter;

use Dashboard\Crm\Stat as Model;
use Carbon;

class StatPresenter extends Presenter {

     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

    
   
    
}