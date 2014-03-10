<?php namespace Dashboard\Crm;

use BaseModel;
// use Dashboard\Crm\ContactPresenter as Presenter;

class ContactRole extends BaseModel {

    // Determine the table as it has different name to this Model class
    protected $table = 'contact_role';
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    
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
     * Defines the relationship of Roles->contacts
     * @return obj 
     */
    public function roles()
    {
        return $this->belongsTo('Dashboard\Crm\Contact');
    }
    
   
}