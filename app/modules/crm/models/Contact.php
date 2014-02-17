<?php

namespace Dashboard\App\Crm;

use \Input, \BaseModel;

class Contact extends BaseModel {
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    
    //Validation rules
    public static $rules = array(
        'first_name'                  => 'between:2,32',
        'last_name'                  => 'required|between:2,32',
        'email'                 => 'email',
    );

}
