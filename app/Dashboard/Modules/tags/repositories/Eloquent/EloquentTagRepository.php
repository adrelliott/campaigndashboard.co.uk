<?php namespace Dashboard\Repositories;

use Dashboard\Tags\Tag as Model;

class EloquentTagRepository extends EloquentRepository implements TagRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}