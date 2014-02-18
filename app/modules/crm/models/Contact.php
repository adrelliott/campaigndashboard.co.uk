<?php

namespace Dashboard\App\Crm;

use \Input, \BaseModel;
use Dashboard\App\Crm\ContactPresenter as Presenter;

class Contact extends BaseModel {
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id', 'date_of_birth'];

    // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\App\Crm\ContactPresenter';
    
    // Validation rules
    public static $rules = array(
        'first_name'                  => 'between:2,32',
        'last_name'                  => 'required|between:2,32',
        'email'                 => 'email',
    );

    // Relationship Rules
    // public static $relationsData = array(
    //     'action'  => array(self::HAS_MANY, 'Action')
    // );
    // 
    public function actions()
    {
        return $this->hasMany('Dashboard\App\Crm\Action');
    }
    public function notes()
    {
        return $this->hasMany('Dashboard\App\Crm\Note');
    }

    public function orders()
    {
        return $this->hasMany('Dashboard\App\Sales\Order');
    }
    
    // public function actions()
    // {
    //     return $this->hasMany('Dashboard\App\Crm\Action');
    // }

}