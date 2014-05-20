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
     * Override here with the cols to return when doing an all() query
     * Set in base model as '*'. 
     * @var array or '*'
     */
    public $selectCols = array('id', 'first_name', 'last_name');

    /**
     * Defines the relationship of tags->contacts
     * @return obj 
     */
    public function tags()
    {
        return $this->belongsToMany('Dashboard\Tags\Tag')->onlyOwners();
    }

    public function roles()
    {
        return $this->hasMany('Dashboard\Crm\ContactRole')->onlyOwners();
    }

    public function orderProducts()
    {
        
        return $this->hasManyThrough('Dashboard\Sales\OrderProduct', 'Dashboard\Sales\Order')
            ->onlyOwners('order_product');
    }
    
    /**
     * Notes relationship
     */
    public function notes()
    {
        return $this->hasMany('Dashboard\Crm\Note')->onlyOwners();
    }

    /**
     * Orders relationship
     */
    public function orders()
    {
        return $this->hasMany('Dashboard\Sales\Order')->onlyOwners();
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

    

    
   
    

}