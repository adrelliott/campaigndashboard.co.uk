<?php

namespace Dashboard\Crm;

use Input, BaseModel;
use Dashboard\Crm\ContactPresenter as Presenter;

class Contact extends BaseModel {
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id', 'date_of_birth'];

    // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Crm\ContactPresenter';
    
    // Validation rules
    public static $rules = array(
        'save' => array(
            'first_name'                  => 'between:2,32',
            'last_name'                  => 'required|between:2,32',
            'email'                 => 'email',
        ),
        'create' => array(),
        'update' => array()
    );


    
    /**
     * Notes relationship
     */
    public function notes()
    {
        return $this->hasMany('Dashboard\Crm\Note');
    }

    /**
     * Orders relationship
     */
    public function orders()
    {
        return $this->hasMany('Dashboard\Sales\Order');
    }

    

}