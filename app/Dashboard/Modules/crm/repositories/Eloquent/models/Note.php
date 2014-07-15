<?php namespace Dashboard\Crm;

use BaseModel;
use McCool\LaravelAutoPresenter\PresenterInterface;

class Note extends BaseModel implements PresenterInterface {
    
     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Crm\NotePresenter';
    
    
    public function contact()
    {
        return $this->belongsTo('Dashboard\Crm\Contact');
    }


}
