<?php namespace Dashboard\Tags;

use BaseModel;

class Tag extends BaseModel {
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Tags\TagPresenter';
   
    /**
     * Defines the relaitonship of tags->contacts
     */
    public function contacts()
    {
        return $this->belongsToMany('Dashboard\Crm\Contact');
    }



    

}