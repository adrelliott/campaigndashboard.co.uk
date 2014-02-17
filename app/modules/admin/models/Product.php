<?php

namespace Dashboard\App\Admin;

use \Input, \BaseModel;

class Product extends BaseModel {
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];
    
    //Validation rules
    public static $rules = array(
        'product_name'                  => 'between:2,250',
        // 'product_price'                 => 'float',
        // 'email'                 => 'email',
    );

}
