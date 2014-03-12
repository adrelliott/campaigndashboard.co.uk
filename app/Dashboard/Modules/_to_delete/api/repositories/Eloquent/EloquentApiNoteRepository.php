<?php namespace Dashboard\Api\Repositories;

use Dashboard\Crm\Note as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashbpard/Repositories/Eloquent

class EloquentApiNoteRepository extends EloquentApiRepository implements NoteApiRepositoryInterface {

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
        'note_name' => 'note_name',
        'note_body' => 'note_body',
        'note_type' => 'note_type',
        'note_category' => 'note_category',
        'note_status' => 'note_status',
        'seen' => 'seen',
        );

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->model->allowableCols = $this->allowableCols;
    }



}