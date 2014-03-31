<?php namespace Dashboard\Handler;

use Dashboard\Events\EventHandler;
use Dashboard\Sales\OrdersController;

use Dashboard\Sales\ProductRepositoryInterface as Products;

class SalesEventHandler extends EventHandler {

    protected $eventPrefix = 'dashboard.sales.';
   

    public function ordersEdit()
    {
        echo 'event fired: orders.edit';

    }

    public function ordersCreate(Products $products)
    {
        # Get list of products
        $productList = $products->all();

        return $productList;

    }

}