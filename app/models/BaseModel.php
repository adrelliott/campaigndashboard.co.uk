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

    public static function boot()
    {
        parent::boot();

        // Hook into the create & update event & set the ownerId
        static::creating(function($thing){ $thing->forceOwnerId(); });
        static::updating(function($thing){ $thing->forceOwnerId(); });

    }

    public function forceOwnerId()
    {
        if (!$this->owner_id)
          $this->owner_id = Auth::user()->owner_id;
    }

    public function scopeOnlyOwners($query)
    {
        $query->whereOwnerId(Auth::user()->owner_id);
    }

}