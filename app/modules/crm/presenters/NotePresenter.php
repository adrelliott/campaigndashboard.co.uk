<?php

namespace Dashboard\App\Crm;
use McCool\LaravelAutoPresenter\BasePresenter;

//Pull in the models required for this record
use Dashboard\App\Crm\Note as Model;
use Dashboard\App\Crm\Action as Action;
use Dashboard\App\Crm\Contact as Contact;
use Dashboard\App\Crm\Tag as Tag;
use Dashboard\App\Admin\User as User;

use \Carbon;

class NotePresenter extends BasePresenter {

     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

    
    public function created_at()
    {
        return $this->resource->created_at->toDayDateTimeString();
    }

    

    
}