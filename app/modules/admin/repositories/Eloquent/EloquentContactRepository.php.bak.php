<?php namespace Dashboard\Repositories;

use Dashboard\Crm\Contact as Model;

class EloquentContactRepository extends EloquentRepository implements ContactRepositoryInterface {

    public function __construct(Model $contact)
    {
        $this->model = $contact;
    }

}