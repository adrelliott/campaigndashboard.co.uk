<?php namespace Dashboard\Repositories;


/**
 * This Interface contains all the basic methods that might be requested by any controller
 *
 * * Put things like getPriceOfProduct() in a specific Interface, e.g. ProductRepositoryInterface
 */
interface RepositoryInterface {
    
    /*
    |--------------------------------------------------------------------------
    | Retreive Collections
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */
    public function all();

    public function getRelated($id, $relatedModel, $with);

    public function get();

    public function lists($colValue, $colKey);


    /*
    |--------------------------------------------------------------------------
    | Retreive Models
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */
    public function find($id, $with);

    public function findOrFail($id, $with);

    public function firstOrFail();

    public function first();

    public function pluck($colName);

    
    /*
    |--------------------------------------------------------------------------
    | Create, Update, or Delete multiple records
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */
     

    
    /*
    |--------------------------------------------------------------------------
    | Create, Update, or Delete individual records
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */
    public function createRecord();
        
    public function updateRecord($id);

    public function destroyRecord($id);
     


    /*
    |--------------------------------------------------------------------------
    | Query Builder Methods
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */
    //things like where()
   
        
   
}
