<?php

namespace Dashboard\Crm;

use Input, BaseModel;

class Action extends BaseModel {
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];
    
    //Validation rules
    public static $rules = array(
        // 'first_name'                  => 'between:2,32',
        // 'last_name'                  => 'required|between:2,32',
        // 'email'                 => 'email',
    );

   
    /**
    * User relationship
    */
    public function user()
    {
        return $this->belongsTo('Dashboard\Admin\User');
    }

    public function contact()
    {
        return $this->belongsTo('Dashboard\Crm\Contact');
    }


    // public function getAction_StatusAttribute($value)
    //     {
    //         return (boolean) $value;
    //     }    
}
