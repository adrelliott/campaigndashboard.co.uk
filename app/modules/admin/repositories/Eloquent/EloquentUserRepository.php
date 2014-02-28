<?php namespace Dashboard\Repositories;

use Dashboard\Admin\User as Model;

class EloquentUserRepository extends EloquentRepository implements UserRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }




    

}