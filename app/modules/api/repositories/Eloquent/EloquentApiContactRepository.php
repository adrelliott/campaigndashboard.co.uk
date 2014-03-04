<?php namespace Dashboard\Api\Repositories;

use Dashboard\Crm\Contact as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashbpard/Repositories/Eloquent

class EloquentApiContactRepository extends EloquentApiRepository implements ContactApiRepositoryInterface {

    /**
     * List of cols we can search for in this table.
     * We never change the apiColName, but this allows us to change our 
     * database col names
     * @var array
     */
    protected $allowableCols = array(
        // 'apiColName' => 'ourColName', 
        'id' => 'id',
        'title' => 'title',
        'first_name' => 'first_name',
        'last_name' => 'last_name',
        'nickname' => 'nickname',
        'email' => 'email',
        'email2' => 'email2',
        'mobile_phone' => 'mobile_phone',
        'home_phone' => 'home_phone',
        'work_phone' => 'work_phone',
        'overseas_phone' => 'overseas_phone',
        'address1' => 'address1',
        'address2' => 'address2',
        'address3' => 'address3',
        'company' => 'company',
        'city' => 'city',
        'postcode' => 'postcode',
        'legacy_id' => 'legacy_id',
        );

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->model->allowableCols = $this->allowableCols;
    }



}