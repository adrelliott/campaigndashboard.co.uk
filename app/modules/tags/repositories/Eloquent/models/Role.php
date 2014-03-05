<?php namespace Dashboard\Tags;

use BaseModel;

class Role extends BaseModel {
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    protected $table = 'contact_role';

    // Wrap in a presenter (ShawnMcCool)
    //public $presenter = 'Dashboard\Tags\RolePresenter';
    
    // Validation rules
    public static $rules = array(
        'save' => array(
            // 'first_name'                  => 'between:2,32',
            // 'last_name'                  => 'required|between:2,32',
            // 'email'                 => 'email',
        ),
        'create' => array(),
        'update' => array()
    );

    /**
     * Defines the relaitonship of roles->contacts 
     *
     * IMPORTANT: Roles are actually tags with extra info
     * 
     * @return obj 
     */
    public function contacts()
    {
        return $this->belongsToMany('Dashboard\Crm\Contact');
    }

    
    /**
     * Notes relationship
     */
    // public function notes()
    // {
    //     return $this->hasMany('Dashboard\Crm\Note');
    // }

    

}