<?php namespace Dashboard\Api\Repositories;

use Dashboard\Broadcasts\Broadcast as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashboard/Repositories/Eloquent

class EloquentApiBroadcastRepository extends EloquentApiRepository implements BroadcastApiRepositoryInterface {

    /**
     * List of cols we can search for in this table.
     * We never change the apiColName, but this allows us to change our 
     * database col names
     * @var array
     */
    protected $allowableCols = array(
        // 'apiColName' => 'ourColName', 
        'id' => 'id',
        'user_id' => 'user_id',
        'sent_at' => 'sent_at',
        'user_id' => 'user_id',
        'search_id' => 'search_id',
        'broadcast_name' => 'broadcast_name',
        'broadcast_type' => 'broadcast_type',
        'broadcast_description' => 'broadcast_description',
        'broadcast_from' => 'broadcast_from',
        'subject_line' => 'subject_line',
        'broadcast_body' => 'broadcast_body',
        'broadcast_template' => 'broadcast_template',
        'ready_to_send' => 'ready_to_send',
        'sent' => 'sent',
        
        );

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->model->allowableCols = $this->allowableCols;
    }



}