<?php namespace Dashboard\Api\Repositories;


/**
 * This Interface contains all the basic methods that might be requested by any API controller
 *
 * Put things like getPriceOfProduct() in a specific Interface, e.g. ProductRepositoryInterface
 */
interface ApiRepositoryInterface {
    
    public function getAll();

    public function findRecord($id);
        
    public function createRecord();
        
    public function updateRecord($id);
    
    public function destroyRecord($id);
}