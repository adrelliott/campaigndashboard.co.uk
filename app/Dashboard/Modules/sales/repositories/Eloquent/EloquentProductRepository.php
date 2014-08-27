<?php namespace Dashboard\Repositories;

use Dashboard\Sales\Product as Model;

class EloquentProductRepository extends EloquentRepository implements ProductRepositoryInterface {

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    public function getProducts()
    {
        //get all products as an object, then get them as a dropdown
        $retval = $this->q->select('id', 'product_title', 'product_price')->get();
        $retval->productList = $this->q->lists('product_title');

        return $retval;
    }
}