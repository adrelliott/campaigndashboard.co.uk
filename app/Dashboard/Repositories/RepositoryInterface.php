<?php namespace Dashboard\Repositories;


/**
 * This Interface contains all the basic methods that might be requested by any controller
 *
 * * Put things like getPriceOfProduct() in a specific Interface, e.g. ProductRepositoryInterface
 */
interface RepositoryInterface {
    
    public function getAll();

    public function findAll();

    public function findRecord($id);
        
    public function createRecord();
        
    public function updateRecord($id);
    
    public function destroyRecord($id);
}
