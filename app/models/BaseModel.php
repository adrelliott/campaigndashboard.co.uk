<?php 

/**
 * This is the class from which all of the app's modle classses are extended. Pus global logic here.
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

    // Define fields that are to be retruned as Carbon instances
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
     * Add scoped for individual models in the relevant model classes
     */

    /**
     * SCOPE: Ensures that we only return the records belonging to the current tenant 
     * @param  object $query The query form the query builder
     */
    public function scopeOnlyOwners($query)
    {
        $query->whereOwnerId(Auth::user()->owner_id);
    }

}