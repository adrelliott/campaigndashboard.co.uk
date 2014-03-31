<?php namespace Dashboard\Sales;

use Dashboard\Presenters\Presenter;
use Dashboard\Sales\Product as Model;
use \Carbon;

class ProductPresenter extends Presenter {

    /** 
     * Columns to return from queries
     * @var array
     */
    // protected $cols = array(
        
    //     ),
    // );

    // protected $product;


     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

   

   

    
}