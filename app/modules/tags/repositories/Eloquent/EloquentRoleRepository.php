<?php namespace Dashboard\Repositories;

use Dashboard\Tags\Tag as Model;

class EloquentRoleRepository extends EloquentRepository implements RoleRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}