<?php namespace Dashboard\Crm;

use BaseModel;
use McCool\LaravelAutoPresenter\PresenterInterface;

class Role extends BaseModel implements PresenterInterface {
    
     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Crm\RolePresenter';
    
    
   /**
     * Defines relationship of roles:contacts
     * @return obj 
     */
    public function contacts()
    {
        return $this->belongsToMany('Dashboard\Crm\Contact')
                    ->withPivot('role_variant', 'role_start_date', 'role_end_date')
                    ->withTimestamps()
                    ->onlyOwners('contact_role');
    }


}
