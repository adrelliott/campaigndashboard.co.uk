<?php

namespace Dashboard\App\Email;
use McCool\LaravelAutoPresenter\BasePresenter;

//Pull in the models required for this record
use Dashboard\App\Email\Broadcast as Model;
// use Dashboard\App\Crm\Action as Action;
// use Dashboard\App\Crm\Note as Note;
// use Dashboard\App\Crm\Tag as Tag;
// use Dashboard\App\Admin\User as User;

use \Carbon;

class BroadcastPresenter extends BasePresenter {

     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

    

}