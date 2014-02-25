<?php

namespace Dashboard\Sales;

use Input, BaseModel;

class OrderProduct extends BaseModel {

    // Determine the table as it has different name to his Modal class
    protected $table = 'orders_products';
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Sales\OrderProductPresenter';

    // public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    
    // Validation rules
    public static $rules = array(
        'contact_id' => 'required',
    ); 

    

    public function contact()
    {
        return $this->belongsTo('Dashboard\Sales\Order');
    }

    // public function orderItems()
    // {
    //     return $this->hasMany('Dashboard\Sales\OrdersProducts');
    // }

//May also have many notes, tasks, tags

    // public function getSeenAttribute($value)
    //     {
    //         return (boolean) $value;
    //     }    
}
