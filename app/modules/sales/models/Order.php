<?php

namespace Dashboard\Sales;

use Input, BaseModel;

class Order extends BaseModel {
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

     // Wrap in a presenter (ShawnMcCool)
    //public $presenter = 'Dashboard\Sales\OrderPresenter';

    // public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    
    // Validation rules
    public static $rules = array(
        'contact_id' => 'required',
    ); 

    
    public function contact()
    {
        return $this->belongsTo('Dashboard\Crm\Contact');
    }

     
}
