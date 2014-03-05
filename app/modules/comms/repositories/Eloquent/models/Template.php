<?php namespace Dashboard\Comms;

use Input, BaseModel;
use Dashboard\Template\MailchimpPresenter as Presenter;

/**
 * Connects to Mailchimp 
 */
class Mailchimp {
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    // Wrap in a presenter (ShawnMcCool)
    public $presenter = Presenter;
    
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
     * Notes relationship
     */
    // public function notes()
    // {
    //     return $this->hasMany('Dashboard\Crm\Note');
    // }

    

}