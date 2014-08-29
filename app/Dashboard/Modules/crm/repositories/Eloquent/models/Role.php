<?php namespace Dashboard\Crm;

use BaseModel;
use Magniloquent\Magniloquent\Magniloquent;
use McCool\LaravelAutoPresenter\PresenterInterface;

class Role extends Magniloquent implements PresenterInterface {
    
     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Crm\RolePresenter';
    
    public function getPresenter()
    {
        return $this->presenter;
    }
    
   /**
     * Defines relationship of roles:contacts
     * @return obj 
     */
    public function contacts()
    {
        return $this->belongsToMany('Dashboard\Crm\Contact')
                    ->withPivot('role_variant', 'role_start_date', 'role_end_date')
                    ->withTimestamps();
    }


}
