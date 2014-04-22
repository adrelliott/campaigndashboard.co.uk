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

    public function getDatatable($name, $queryType);

    public function getRelated($id, $relatedModel, $with);

   

    /*
    |--------------------------------------------------------------------------
    | Retreive Models
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */
    
    
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
    public function with($args);
   
        
   
}
