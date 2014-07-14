<?php namespace Dashboard\Broadcasts;

use McCool\LaravelAutoPresenter\BasePresenter as Presenter;
use Dashboard\Broadcasts\Broadcast as Model;
use Carbon;


class BroadcastPresenter extends Presenter {

     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

    

}