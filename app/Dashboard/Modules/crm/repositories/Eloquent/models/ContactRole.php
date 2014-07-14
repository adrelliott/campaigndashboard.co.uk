<?php namespace Dashboard\Crm;

use BaseModel;
use McCool\LaravelAutoPresenter\PresenterInterface;

class ContactRole extends BaseModel implements PresenterInterface {

   
    // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Crm\ContactRolePresenter';
    
    
   
}