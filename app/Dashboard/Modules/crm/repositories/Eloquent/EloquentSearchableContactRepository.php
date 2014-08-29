<?php namespace Dashboard\Repositories;

use Dashboard\Crm\SearchableContact as Model;

class EloquentSearchableContactRepository extends EloquentRepository implements SearchableContactRepositoryInterface {

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

}