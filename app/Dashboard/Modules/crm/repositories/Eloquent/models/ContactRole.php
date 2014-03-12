<?php namespace Dashboard\Crm;

use BaseModel;

class ContactRole extends BaseModel {

    // Determine the table as it has different name to this Model class
    protected $table = 'contact_role';
    
   
    // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Crm\RolePresenter';
    
    /**
     * Defines the relationship of Roles->contacts
     * @return obj 
     */
    public function roles()
    {
        return $this->belongsTo('Dashboard\Crm\Contact');
    }
    
   
}