<?php namespace Dashboard\Repositories;

use Dashboard\Template\Template as Model;

class EloquentTemplateRepository extends EloquentRepository implements TemplateRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}