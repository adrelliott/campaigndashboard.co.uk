<?php namespace Dashboard\Repositories;

use Dashboard\Crm\Role as Model;

class EloquentRoleRepository extends EloquentRepository implements RoleRepositoryInterface {

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

}