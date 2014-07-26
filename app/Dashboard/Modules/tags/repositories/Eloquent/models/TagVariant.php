<?php namespace Dashboard\Tags;

use BaseModel;

/**
 * Tag variants provide a sort-of metadata layer for the tagging engine. This way,
 * we can add custom information alongside each 
 */
class TagVariant extends BaseModel {
    
    protected $guarded = [ 'id' ];
    protected static $relationships = array(
        'tag' => array( 'belongsTo', "\Dashboard\Tags\Tag" )
    );

}