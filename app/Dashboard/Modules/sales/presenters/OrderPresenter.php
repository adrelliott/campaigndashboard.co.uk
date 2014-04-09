<?php namespace Dashboard\Sales;

use Dashboard\Presenters\Presenter;
use \Carbon;

class OrderPresenter extends Presenter {

    /** 
     * Columns to return from queries
     * @var array
     */
    // protected $cols = array(
    //     'orderItems' => array(
    //         'product_id',
    //         'variant',
    //         'quantity',
    //         'price',
    //         'order_id',
    //         'product_id',
    //         'variant',
    //         'quantity',
    //         'tax',
    //         'price',
    //     ),
    // );

    // protected $product;


   public function getProductName()
   {
       return 'prod name';
       // return $this->resource->product->product_title;
   }

    public function orderItems()
    {
        return $this->resource->products;
    }   

    public function toGBP($price)
    {
        return (float)$price/100;
    }


    public function orderItemsBlankRow()
    {
        $retval = $this->orderItems;


        // set up blank 
        // $retval[] = array_fill_keys($this->cols['orderItems'], '');

        return $retval;
    }

   

    
}