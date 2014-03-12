<?php namespace Dashboard\Api\Repositories;

use Dashboard\Sales\OrderProduct as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashboard/Repositories/Eloquent

class EloquentApiOrderProductRepository extends EloquentApiRepository implements OrderProductApiRepositoryInterface {

    /**
     * List of cols we can search for in this table.
     * We never change the apiColName, but this allows us to change our 
     * database col names
     * @var array
     */
    protected $allowableCols = array(
        // 'apiColName' => 'ourColName', 
        'id' => 'id',
        'order_id' => 'order_id',
        'product_id' => 'product_id',
        );

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->model->allowableCols = $this->allowableCols;
    }



}