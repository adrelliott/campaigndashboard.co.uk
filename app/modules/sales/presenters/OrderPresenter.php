<?php

namespace Dashboard\App\Sales;
use McCool\LaravelAutoPresenter\BasePresenter;

//Pull in the models required for this record
use Dashboard\App\Crm\Order as Model;
use Dashboard\App\Crm\Note as Note;
use Dashboard\App\Crm\Action as Action;
use Dashboard\App\Crm\Contact as Contact;
use Dashboard\App\Crm\Tag as Tag;

use \Carbon;

class OrderPresenter extends BasePresenter {

     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

    
    public function created_at()
    {
        return $this->resource->created_at->toDayDateTimeString();
    }

    
}