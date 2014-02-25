<?php

namespace Dashboard\Email;

use McCool\LaravelAutoPresenter\BasePresenter;
use Dashboard\Email\Broadcast as Model;
use Carbon;

class BroadcastPresenter extends BasePresenter {

     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

    

}