<?php namespace Dashboard\Handler;

use Dashboard\Events\EventHandler;

class SalesEventHandler extends EventHandler {

    protected $eventPrefix = 'dashboard.sales.';

    // public function ordersEdit10222()
    // {
    //     echo 'event fired: orders.edit.10222';
    // }
    public function ordersEdit()
    {
        echo 'event fired: orders.edit';
    }


    


}