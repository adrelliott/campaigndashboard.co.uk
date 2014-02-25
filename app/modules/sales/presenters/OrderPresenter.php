<?php

namespace Dashboard\Sales;
use McCool\LaravelAutoPresenter\BasePresenter;

//Pull in the models required for this record
use Dashboard\Sales\Order as Model;
use Dashboard\Sales\OrderProduct as OrderProduct;
use Dashboard\Crm\Note as Note;
use Dashboard\Crm\Action as Action;
use Dashboard\Crm\Contact as Contact;
use Dashboard\Crm\Tag as Tag;

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