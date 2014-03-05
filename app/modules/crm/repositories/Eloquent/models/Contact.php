<?php namespace Dashboard\Crm;

use BaseModel;
// use Dashboard\Crm\ContactPresenter as Presenter;

class Contact extends BaseModel {
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Crm\ContactPresenter';
    
    // Validation rules
    public static $rules = array(
        'save' => array(
            'first_name'                  => 'between:2,32',
            'last_name'                  => 'required|between:2,32',
            'email'                 => 'email',
        ),
        'create' => array(),
        'update' => array()
    );


    /**
     * Defines the relaitonship of tags->contacts
     * @return obj 
     */
    public function tags()
    {
        return $this->belongsToMany('Dashboard\Tags\Tag', 'tag_pivot');
    }

    public function roles()
    {
        return $this->hasMany('Dashboard\Tags\Role');
    }
    
    /**
     * Defines the relaitonship of roles->contacts 
     *
     * IMPORTANT: Roles are actually tags with extra info
     * 
     * @return obj 
     */
    // public function tags()
    // {
    //     return $this->belongsToMany('Dashboard\Tags\Tag');
    //     // return $this->belongsToMany('Dashboard\Tags\Role', 'tag_pivot', 'contact_id', 'tag_id');
    // }

    

    
    /**
     * Notes relationship
     */
    public function notes()
    {
        return $this->hasMany('Dashboard\Crm\Note');
    }

    /**
     * Orders relationship
     */
    public function orders()
    {
        return $this->hasMany('Dashboard\Sales\Order');
    }

    

}