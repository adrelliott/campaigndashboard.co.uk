<?php namespace Dashboard\Tags;

use BaseModel;

class Tag extends BaseModel {
    
    protected static $relationships = array(
        'contacts' => array( 'belongsToMany', "\Dashboard\Crm\Contact" ),
        'tag_variants' => array( 'hasMany', "\Dashboard\Tags\TagVariant" ),
    );

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];
    public $presenter = 'Dashboard\Tags\TagPresenter';
}