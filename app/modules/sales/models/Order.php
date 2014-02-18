<?php

namespace Dashboard\App\Sales;

use \Input, \BaseModel;

class Order extends BaseModel {
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\App\Sales\OrderPresenter';

    // public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    
    // Validation rules
    public static $rules = array(
        'contact_id' => 'required',
    ); 

    
    public function contact()
    {
        return $this->belongsTo('Dashboard\App\Crm\Contact');
    }

    public function orderItems()
    {
        return $this->hasMany('Dashboard\App\Sales\OrderProduct');
    }

//May also have many notes, tasks, tags

    // public function getSeenAttribute($value)
    //     {
    //         return (boolean) $value;
    //     }    
}
