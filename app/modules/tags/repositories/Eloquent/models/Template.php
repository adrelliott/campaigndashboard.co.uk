<?php namespace Dashboard\Tags;

use Input, BaseModel;
use Dashboard\Tags\TagPresenter as Presenter;

class Tag extends BaseModel {
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    // Wrap in a presenter (ShawnMcCool)
    public $presenter = Presenter;
    
    // Validation rules
    public static $rules = array(
        'save' => array(
            // 'first_name'                  => 'between:2,32',
            // 'last_name'                  => 'required|between:2,32',
            // 'email'                 => 'email',
        ),
        'create' => array(),
        'update' => array()
    );


    
    /**
     * Notes relationship
     */
    // public function notes()
    // {
    //     return $this->hasMany('Dashboard\Crm\Note');
    // }

    

}