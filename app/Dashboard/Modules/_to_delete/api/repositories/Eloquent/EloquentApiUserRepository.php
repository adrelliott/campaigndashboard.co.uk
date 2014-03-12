<?php namespace Dashboard\Repositories;

use Dashboard\Admin\User as Model;

class EloquentApiUserRepository extends EloquentRepository implements  UserApiRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}