<?php 

/**
 * This is the class from which all of the app's modle classses are extended. Pus global logic here.
 */
use LaravelBook\Ardent\Ardent;
use Magniloquent\Magniloquent\Magniloquent;

class BaseModel extends Magniloquent {

     //When we call User::destroy(1); it actually only soft deletes the record
    protected $softDelete = true;

    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    // Validation rules
    public static $rules = array(
        'save' => array(),
        'create' => array(),
        'update' => array()
    );

}