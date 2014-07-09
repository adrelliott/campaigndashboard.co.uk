<?php 

/**
 * This is the class from which all of the app's model classes are extended. Put global logic here.
 */
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

    /**
     * Sets a default value for a presenter
     * @var boolean
     */
    public $presenter = FALSE;

    /**
     * If we use a presnter, we implement the interface 
     * @return string namespaced path to presenter
     */
    public function getPresenter()
    {
        return $this->presenter;
    }

    // Define fields that are to be returned as Carbon instances
    public function getDates()
    {
        return array('created_at', 'updated_at', 'deleted_at');
    }

    /**
     * Runs on every Eloquent Query
     */
    public static function boot()
    {
        parent::boot();

        // Hook into the create & update event & set the ownerId
        static::creating(function($object){ $object->forceOwnerId(); });
        static::updating(function($object){ $object->forceOwnerId(); });

        // What about doing it for delete?????????

    }

    

    /**
     * Ensures that the record being saved is attributed to the right tenant  
     * 
     */
    public function forceOwnerId()
    {
        if (!$this->owner_id)
          $this->owner_id = Auth::user()->owner_id;
    }


    /**
     * Global Scopes
     *
     * Add scopes for individual models in the relevant model classes
     */

    /**
     * SCOPE: Ensures that we only return the records belonging to the current tenant 
     * @param  object $query The query form the query builder
     */
    public function scopeOnlyOwners($query, $tableName = NULL, $colName = 'owner_id')
    {
        if ( $tableName ) $colName = $tableName . '.owner_id';
        $query->where($colName, Auth::user()->owner_id);
    }

}