<?php namespace Dashboard\Repositories;


/**
 * This Interface contains all the basic methods that might be requested by any controller
 *
 * * Put things like getPriceOfProduct() in a specific Interface, e.g. ProductRepositoryInterface
 */
interface RepositoryInterface {
    
    /**
     * Overrides the default all() (and adds in the queryscope to just get this owner's records)
     * @return returns Eloquent collection
     */
    public function all();

    public function getRelated($id, $relatedModel, $with);

    public function find($id, $with);

    public function findOrFail($id, $with);

    public function firstOrFail();

    public function get();

    public function first();

    public function pluck($colName);

    public function lists($colValue, $colKey);
    
    // public function where($column, $operator = null, $value = null, $boolean = 'and');

    // public function firstOrCreate();





    /**
     * This is the all()
     * @return [type] [description]
     */
    public function getAll();



    public function findAll();

    public function findRecord($id);
        
    public function createRecord();
        
    public function updateRecord($id);
    
    public function destroyRecord($id);
}
