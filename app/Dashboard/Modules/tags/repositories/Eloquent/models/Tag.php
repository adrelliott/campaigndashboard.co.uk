<?php namespace Dashboard\Tags;

use BaseModel;

class Tag extends BaseModel {
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Tags\TagPresenter';
    
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
     * Defines the relaitonship of tags->contacts
     * @return obj 
     */
    public function contacts()
    {
        return $this->belongsToMany('Dashboard\Crm\Contact', 'tag_pivot');
    }

    
    /**
     * Notes relationship
     */
    // public function notes()
    // {
    //     return $this->hasMany('Dashboard\Crm\Note');
    // }

    

}