<?php namespace Dashboard\Repositories;

use Dashboard\Broadcasts\Template as Model;

class EloquentTemplateRepository extends EloquentRepository implements TemplateRepositoryInterface {

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    

}