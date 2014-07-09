<?php namespace Dashboard\Repositories;

use Dashboard\Homepage\Stat as Model;

class EloquentStatRepository extends EloquentRepository implements StatRepositoryInterface {

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    /**
     * Count all contacts who belong to a tenant
     * @return int 
     */
    public function countAllContacts()
    {
        return '1000000';
    }


}

