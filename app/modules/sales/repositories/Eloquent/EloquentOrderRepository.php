<?php namespace Dashboard\Repositories;

use Dashboard\Sales\Order as Model;

class EloquentOrderRepository extends EloquentRepository implements OrderRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}