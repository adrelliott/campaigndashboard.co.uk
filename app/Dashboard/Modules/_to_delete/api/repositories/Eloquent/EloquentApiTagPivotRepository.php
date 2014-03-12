<?php namespace Dashboard\Api\Repositories;

use Dashboard\Tags\TagPivot as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashboard/Repositories/Eloquent

class EloquentApiTagPivotRepository extends EloquentApiRepository implements TagPivotApiRepositoryInterface {

    /**
     * List of cols we can search for in this table.
     * We never change the apiColName, but this allows us to change our 
     * database col names
     * @var array
     */
    protected $allowableCols = array(
        // 'apiColName' => 'ourColName', 
        'id' => 'id',
        'tag_id' => 'tag_id',
        'owner_id' => 'owner_id',
        'contact_id' => 'contact_id',
        'action_id' => 'action_id',
        'broadcast_id' => 'broadcast_id',
        'campaign_id' => 'campaign_id',
        'lead_id' => 'lead_id',
        'note_id' => 'note_id',
        'order_id' => 'order_id',
        'user_id' => 'user_id',
        'variant' => 'variant',
        'tag_note', => 'tag_note',,
        'tag_end_timestamp' => 'tag_end_timestamp',
        'tag_start_timestamp' => 'tag_start_timestamp',
    );

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->model->allowableCols = $this->allowableCols;
    }



}