<?php

namespace Dashboard\App\Crm;

use \Input, \BaseModel;

class Note extends BaseModel {
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\App\Crm\NotePresenter';

    // public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    
    // Validation rules
    public static $rules = array(
        'note_name' => 'required',
    ); 

    // Relationship Rules
    // public static $relationsData = array(
    //     'contact'  => array(self::BELONGS_TO, 'Contact')
    // );

    public function contact()
    {
        return $this->belongsTo('Dashboard\App\Crm\Contact');
    }


    // public function getSeenAttribute($value)
    //     {
    //         return (boolean) $value;
    //     }    
}
