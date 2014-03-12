<?php

namespace Dashboard\Crm;

use Input, BaseModel;

class Action extends BaseModel {

   
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


}
