<?php

namespace Dashboard\App\Sales;

use \Input, \BaseModel;

class OrderProduct extends BaseModel {

    // Determine the table as it has different name to his Modal class
    protected $table = 'orders_products';
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\App\Sales\OrderProductPresenter';

    // public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    
    // Validation rules
    public static $rules = array(
        'contact_id' => 'required',
    ); 

    

    public function contact()
    {
        return $this->belongsTo('Dashboard\App\Sales\Order');
    }

    // public function orderItems()
    // {
    //     return $this->hasMany('Dashboard\App\Sales\OrdersProducts');
    // }

//May also have many notes, tasks, tags

    // public function getSeenAttribute($value)
    //     {
    //         return (boolean) $value;
    //     }    
}
