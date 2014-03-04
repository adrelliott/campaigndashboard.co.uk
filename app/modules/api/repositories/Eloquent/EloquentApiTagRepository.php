<?php namespace Dashboard\Api\Repositories;

use Dashboard\Crm\Tag as Model;
use Dashboard\Repositories\EloquentApiRepository;   //Stored under Dashbpard/Repositories/Eloquent

class EloquentApiTagRepository extends EloquentApiRepository implements TagApiRepositoryInterface {

    /**
     * List of cols we can search for in this table.
     * We never change the apiColName, but this allows us to change our 
     * database col names
     * @var array
     */
    protected $allowableCols = array(
        // 'apiColName' => 'ourColName', 
        'id' => 'id',
        'tag_name' => 'tag_name',
        'tag_description' => 'tag_description',
        'tag_category' => 'tag_category',
        );

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->model->allowableCols = $this->allowableCols;
    }



}