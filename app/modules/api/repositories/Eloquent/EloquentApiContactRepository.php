<?php namespace Dashboard\Api\Repositories;

use Dashboard\Crm\Contact as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashbpard/Repositories/Eloquent

class EloquentApiContactRepository extends EloquentApiRepository implements ContactApiRepositoryInterface {

    public function __construct(Model $contact)
    {
        $this->model = $contact;
    }

}