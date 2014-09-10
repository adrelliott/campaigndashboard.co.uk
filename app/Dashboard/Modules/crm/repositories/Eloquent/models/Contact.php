<?php namespace Dashboard\Crm;

use BaseModel;
use McCool\LaravelAutoPresenter\PresenterInterface;
use \Dashboard\Observers\ContactObserver;

class Contact extends BaseModel implements PresenterInterface {

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_OTHER = 3;

    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    protected $allowable = ['first_name', 'last_name', 'email', 'email2', 'mobile_phone', 'home_phone', 'work_phone',
        'overseas_phone', 'address1', 'company', 'address2', 'address3', 'city', 'postcode', 'county', 'country',
        'legacy_id', 'record_type', 'gender', 'date_of_birth', 'twitter_id', 'optin_email', 'optin_sms', 'optin_post'];


    // Wrap in a presenter (ShawnMcCool), or delete this line if no presenter required
    public $presenter = 'Dashboard\Crm\ContactPresenter';

    protected static $relationships = array(
        'login' => array( 'hasOne', "\Dashboard\Me\ContactLogin" ),
        'tag_variants' => array( 'hasMany', "\Dashboard\Tags\TagVariant" ),
    );
    
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

    public static function boot()
    {
        parent::boot();

        Contact::observe(new ContactObserver);
    }

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
        return $this->belongsToMany('Dashboard\Tags\Tag', 'contact_tag', 'contact_id')->onlyOwners('contact_tag');
    }

    public function tagging()
    {
        return $this->hasManyThrough('Dashboard\Tags\ContactTag')->onlyOwners();
    }

    /**
     * Defines relationship of roles
     * @return obj 
     */
    public function roles()
    {
        return $this->belongsToMany('Dashboard\Crm\Role')
                    ->withPivot('notes', 'season', 'start', 'end')
                    ->withTimestamps();
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