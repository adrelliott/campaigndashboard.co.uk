<?php namespace Dashboard\Broadcasts;

use McCool\LaravelAutoPresenter\BasePresenter;
use Dashboard\Broadcasts\Broadcast as Model;
use Carbon;


class BroadcastPresenter extends BasePresenter {

     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

    

}