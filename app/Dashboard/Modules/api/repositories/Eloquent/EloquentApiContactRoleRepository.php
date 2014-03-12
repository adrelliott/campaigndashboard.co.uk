<?php namespace Dashboard\Api\Repositories;

use Dashboard\Crm\ContactRole as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashboard/Repositories/Eloquent

class EloquentApiContactRoleRepository extends EloquentApiRepository implements ContactRoleApiRepositoryInterface {

    /**
     * List of cols we can search for in this table.
     * We never change the apiColName, but this allows us to change our 
     * database col names
     * @var array
     */
    protected $allowableCols = array(
        // 'apiColName' => 'ourColName', 
        'id' => 'id',
        'role_start_timestamp' => 'role_start_timestamp',
        'role_end_timestamp' => 'role_end_timestamp',
        'role_note' => 'role_note',
        'role_variant' => 'role_variant',
        );

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->model->allowableCols = $this->allowableCols;
    }



}