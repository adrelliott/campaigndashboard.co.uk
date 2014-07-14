<?php namespace Dashboard\Crm;

use BaseModel;
use McCool\LaravelAutoPresenter\PresenterInterface;

class Contact extends BaseModel implements PresenterInterface {
    

    // Wrap in a presenter (ShawnMcCool), or delete this line if no presenter required
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
     * Defines the relationship of tags->contacts
     * @return obj 
     */
    public function tags()
    {
        return $this->belongsToMany('Dashboard\Tags\Tag')->onlyOwners();
    }

    
    /**
     * Defines relationship of roles
     * @return obj 
     */
    public function roles()
    {
        return $this->belongsToMany('Dashboard\Crm\Role')
                    ->withPivot('role_variant', 'role_start_date', 'role_end_date')
                    ->withTimestamps()
                    ->onlyOwners('contact_role');
    }

    /**
     * Defines the (complex) relationship orderproducts has to contacts
     * @return [type] [description]
     */
    public function orderProducts()
    {
        return $this->hasManyThrough('Dashboard\Sales\OrderProduct', 'Dashboard\Sales\Order')
            ->onlyOwners('order_product');
    }


}