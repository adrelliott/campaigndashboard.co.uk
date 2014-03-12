<?php namespace Dashboard\Crm;

use BaseModel;

class Note extends BaseModel {
    
     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Crm\NotePresenter';
    
    
    public function contact()
    {
        return $this->belongsTo('Dashboard\Crm\Contact');
    }


}
