<?php namespace Dashboard\Repositories;

use Dashboard\Tags\ContactTag as Model;

class EloquentContactTagRepository extends EloquentRepository implements ContactTagRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    

}