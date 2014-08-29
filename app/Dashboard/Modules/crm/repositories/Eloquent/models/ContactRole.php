<?php namespace Dashboard\Crm;

use BaseModel;
use McCool\LaravelAutoPresenter\PresenterInterface;

class ContactRole extends BaseModel implements PresenterInterface {
	protected $table = 'contact_role';
	   
    // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Crm\ContactRolePresenter';
    
    
   
}