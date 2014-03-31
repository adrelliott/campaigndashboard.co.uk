<?php namespace Dashboard\Repositories;

use Dashboard\Sales\Product as Model;

class EloquentProductRepository extends EloquentRepository implements ProductRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}