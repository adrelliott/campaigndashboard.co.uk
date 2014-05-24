<?php namespace Dashboard\Repositories;

use Dashboard\Crm\ContactRole as Model;

class EloquentContactRoleRepository extends EloquentRepository implements ContactRoleRepositoryInterface {

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

}