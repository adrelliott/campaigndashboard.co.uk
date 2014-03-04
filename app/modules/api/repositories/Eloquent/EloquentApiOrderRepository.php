<?php namespace Dashboard\Api\Repositories;

use Dashboard\Sales\Order as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashboard/Repositories/Eloquent

class EloquentApiOrderRepository extends EloquentApiRepository implements OrderApiRepositoryInterface {

    /**
     * List of cols we can search for in this table.
     * We never change the apiColName, but this allows us to change our 
     * database col names
     * @var array
     */
    protected $allowableCols = array(
        // 'apiColName' => 'ourColName', 
        'id' => 'id',
        'contact_id' => 'contact_id',
        'user_id' => 'user_id',
        'lead_id' => 'lead_id',
        'order_title' => 'order_title',
        'payment_method' => 'payment_method',
        'order_source' => 'order_source',
        'order_notes' => 'order_notes',
        'order_total' => 'order_total',
        'temp_item' => 'temp_item',
        'temp_season' => 'temp_season',
        );

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->model->allowableCols = $this->allowableCols;
    }



}