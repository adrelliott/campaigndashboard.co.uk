<?php namespace Dashboard\Api\Repositories;

use Dashboard\Crm\Action as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashbpard/Repositories/Eloquent

class EloquentApiActionRepository extends EloquentApiRepository implements ActionApiRepositoryInterface {

    /**
     * List of cols we can search for in this table.
     * We never change the apiColName, but this allows us to change our 
     * database col names
     * @var array
     */
    protected $allowableCols = array(
        // 'apiColName' => 'ourColName', 
        'id' => 'id',
        'contact_id' => 'contact_id',
        'user_id' => 'user_id',
        'order_id' => 'order_id',
        'lead_id' => 'lead_id',
        'action_name' => 'action_name',
        'action_description' => 'action_description',
        'action_type' => 'action_type',
        'action_category' => 'action_category',
        'action_status' => 'action_status',
        'completed' => 'completed',
        'action_end_timestamp' => 'action_end_timestamp',
        'action_start_timestamp' => 'action_start_timestamp',
        );

    public function __construct(Model $action)
    {
        $this->model = $action;
        $this->model->allowableCols = $this->allowableCols;
    }



}