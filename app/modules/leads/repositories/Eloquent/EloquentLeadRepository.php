<?php namespace Dashboard\Repositories;

use Dashboard\Leads\Lead as Model;

class EloquentLeadRepository extends EloquentRepository implements LeadRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}