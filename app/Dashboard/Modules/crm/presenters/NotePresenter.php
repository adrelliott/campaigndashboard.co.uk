<?php

namespace Dashboard\Crm;

use McCool\LaravelAutoPresenter\BasePresenter;
use Dashboard\Crm\Note as Model;
use Dashboard\Crm\Action as Action;
use Dashboard\Crm\Contact as Contact;
use Dashboard\Crm\Tag as Tag;
use Dashboard\Admin\User as User;
use Carbon;

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