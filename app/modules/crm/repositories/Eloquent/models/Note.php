<?php

namespace Dashboard\Crm;

use Input, BaseModel;

class Note extends BaseModel {
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Crm\NotePresenter';

    // public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    
    // Validation rules
    public static $rules = array(
        'note_name' => 'required',
    ); 

    // public static $relationsData = array(
    //     // 'user' => array(self::HAS_ONE, 'Dashboard\Admin\User'),
    //     'user' => array(self::BELONGS_TO_MANY, 'Dashboard\Admin\User'),
    //     // 'contact'  => array(self::HAS_MANY, 'Dashboard\Crm\Contact'),
    //     //'groups'  => array(self::BELONGS_TO_MANY, 'Group', 'table' => 'groups_have_users')
    // );

    public function contact()
    {
        return $this->belongsTo('Dashboard\Crm\Contact');
    }

    public function name()
    {
        return $this->hasOne('Dashboard\Admin\User');
    }

    // public function user()
    // {
    //     return $this->belongsTo('Dashboard\Admin\User');
    // }


    // public function getSeenAttribute($value)
    //     {
    //         return (boolean) $value;
    //     }    
}
