<?php namespace Dashboard\Crm;

use BaseModel, \App, \Auth, \Route;
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

    public function scopeOnlyOwners($query, $tableName = NULL, $colName = 'owner_id')
    {
        if ( $tableName ) $colName = $tableName . '.owner_id';

        if (!App::runningInConsole())
        {
            if (Route::current()->getAction()['prefix'] == 'me')
                $query->where($colName, Auth::contactLogin()->user()->owner_id);
            else
                $query->where($colName, Auth::user()->user()->owner_id);
        }
    }

}
