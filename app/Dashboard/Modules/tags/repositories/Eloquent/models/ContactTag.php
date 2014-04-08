<?php namespace Dashboard\Tags;

use BaseModel;

class ContactTag extends BaseModel {
    
    // Do not allow updating of these fields
    // protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    // Wrap in a presenter (ShawnMcCool)
    // public $presenter = 'Dashboard\Tags\TagPresenter';
   
    /**
     * Defines the relaitonship of tags->contacts
     */
    // public function contacts()
    // {
    //     return $this->belongsToMany('Dashboard\Crm\Contact');
    // }

    public function getFor($dataTable = TRUE)
    {
        $this->setCols();
        if ( $contact_id = Input::get('contact_id') ) $this->q->where('contact_id', $contact_id);
        if ( $sortASC = Input::get('sortASC') ) $this->q->orderBy($sortASC, 'asc');
        if ( $sortDESC = Input::get('sortDESC') ) $this->q->orderBy($sortDESC, 'desc');
        // $this->q->where('');
        return $this->getResult($dataTable);
    }


    

}