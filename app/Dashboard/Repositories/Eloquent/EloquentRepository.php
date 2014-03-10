<?php namespace Dashboard\Repositories;

use Auth, Input;
use Bllim\Datatables\Datatables;

/**
 * This class interacts with Eloquent to serve the Base Controller (via the injected interface)
 */

class EloquentRepository {

    /** 
     * Holds the model object ready for the query
     * @var obj
     */
    protected $q;

   
   /****************** RESTful methods *******************/

    // Basic RESTful methods   
    public function findRecord($id)
    {
        return $this->model->findOrFail($id);
    }


    public function createRecord()
    {
        // 1. Create new object and fill it with $_POST ($fillable is set)
        $record = new $this->model(Input::all());
        $record->owner_id = Auth::user()->owner_id;       

        // 2. Now save it and set a success flag
        if ( $record->save() ) $record->result = TRUE;

        return $record;
    }


    public function updateRecord($id = FALSE)
    {
        // 1. Find the model & fill with $_POST (protected with $fillable)
        $record = $this->model->findOrFail($id);
        $record->fill(Input::all());
        $record->owner_id = Auth::user()->owner_id;   

        // 2. Save the new model and set a success flag
        if ( $record->save() ) $record->result = TRUE;
        return $record;
    }


    public function destroyRecord($id = FALSE)
    {
        die('The destroy method has not been created yet - see Dashbpard\Repo\Eloquent\Eloquentrepo');
    }



    /*********************** general Mehtods for data handling *******************/

    /**
     * Get all records, using URL params to constrain
     * @param  boolean $dataTable Pass to datatables?
     * @return array The artay of results that match the query
     */
    public function getAll($dataTable = TRUE)
    {
        $this->setCols();
        return $this->getResult($dataTable);
    }

    public function getFor($dataTable = TRUE)
    {
        $this->setCols();
        if ( $contact_id = Input::get('contact_id') ) $this->q->where('contact_id', $contact_id);
        return $this->getResult($dataTable);
    }

   
    /**
     * Sets up the 'select' portioncof the query (from $_GET['cols'] params)
     */
    public function setCols()
    {
        // Set up cols from $_GET['cols'] CSV
        if ( Input::get('cols') ) $cols = explode(',', Input::get('cols'));
        else $cols = array('id');

        //Set up  the query object
        $this->q = $this->model->select($cols);
    }

    
    /**
     * handles the query and returns results 
     * @param  [type] $dataTable [description]
     * @return [type]            [description]
     */
    public function getResult($dataTable)
    {
        $this->q->where('owner_id', Auth::user()->owner_id);
       
        // if its datatable then run it through Datatables class
        if ( $dataTable ) $result = Datatables::of($this->q)->make();
        else $result = $this->q->get();

        return $result;
    }

   
}