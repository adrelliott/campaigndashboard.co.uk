<?php

namespace Dashboard\Broadcast;

use Input, BaseModel;
use Dashboard\Broadcast\BroadcastPresenter as Presenter;

class Broadcast extends BaseModel {
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Presenter';
    
    // Validation rules
    public static $rules = array(
        'broadcast_name'                  => 'between:2,32',
    );

    
    /**
     * Notes relationship
     */
    // public function notes()
    // {
    //     return $this->hasMany('Dashboard\Crm\Note');
    // }

    /**
     * Orders relationship
     */
    // public function orders()
    // {
    //     return $this->hasMany('Dashboard\Sales\Order');
    // }

    

}