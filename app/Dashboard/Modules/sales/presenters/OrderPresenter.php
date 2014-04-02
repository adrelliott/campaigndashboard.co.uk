<?php namespace Dashboard\Sales;

use Dashboard\Presenters\Presenter;
use Dashboard\Sales\Order as Model;
use Dashboard\Repositories\ProductRepositoryInterface as Products;
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


   public function productList()
   {
       return $this->resource->productList;
   }

    public function orderItems()
    {
        return $this->resource->products;
    }   

    public function toGBP($price)
    {
        return (float)$price/100;
    }



// public function orderItems1()
//     {
//         $orderItems = $this->resource->toArray();

//         return $orderItems['products'];
//     }

//     public function getProperty($object)
//     {
//         $array = $object->toArray();
//         return $array[$object];
//     }   



    // public function orderItems()
    // {
    //     $orderItems = $this->resource->products;
        
    //     foreach ($orderItems as $k => $o )
    //     {
    //         $orderItems[$k] = $o['pivot'];
    //     }

    //     return $orderItems->toArray();
    // }

    public function orderItemsBlankRow()
    {
        $retval = $this->orderItems;


        // set up blank 
        // $retval[] = array_fill_keys($this->cols['orderItems'], '');

        return $retval;
    }

   

    
}