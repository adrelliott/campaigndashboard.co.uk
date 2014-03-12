<?php namespace Dashboard\Api\Repositories;

use Dashboard\Crm\Product as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashbpard/Repositories/Eloquent

class EloquentApiProductRepository extends EloquentApiRepository implements ProductApiRepositoryInterface {

    /**
     * List of cols we can search for in this table.
     * We never change the apiColName, but this allows us to change our 
     * database col names
     * @var array
     */
    protected $allowableCols = array(
        // 'apiColName' => 'ourColName', 
        'id' => 'id',
        'product_name' => 'product_name',
        'product_description' => 'product_description',
        'product_price' => 'product_price',
        'product_category' => 'product_category',
        'product_sku' => 'product_sku',
        );

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->model->allowableCols = $this->allowableCols;
    }



}