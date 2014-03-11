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


    /* Used for the API call */
    // public static function prepareQuery()
    // {
    //     // Set up defaults
    //     $defaults = array(
    //         'cols' => 'id',
    //         'where' => FALSE,
    //         );

    //     // Get all the URL paramaters 
    //     foreach (Input::all() as $p => $val)
    //     {
    //         if (array_key_exists($p, $defaults))
    //         {
    //             $defaults[$p] = explode(',', str_replace(' ', '', $val)); 
    //             // switch ($p)
    //             // {
    //             //     case 'cols':
    //             //         $defaults[$p] = explode(',', str_replace(' ', '', $val)); 
    //             //         break;

    //             //     case 'where':
    //             //         $defaults[$p] = explode(',', str_replace(' ', '', $val));
    //             //         break;

    //             // }   
    //         }
    //     }

    //     return $defaults;
    // }
    
}