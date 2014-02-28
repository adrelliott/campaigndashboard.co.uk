<?php namespace Dashboard\Repositories;

use Auth, Config, Request, App, Session, Input;

/**
 * This class interacts with Eloquent to serve the Base Controller (via the injected interface)
 */

abstract class EloquentRepository {

    // Basic RESTful methods   

    public function findRecord($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createRecord()
    {
        // 1. Create new object and fill it with $_POST ($fillable is set)
        $record = new $this->model;
        $record->fill(Input::all());
        $record->owner_id = Session::get('owner_id');       

        // 2. Now save it and redirect accordingly 
        if ( $record->save() ) $record->result = TRUE;

        return $record;
    }

    public function updateRecord($id = FALSE)
    {
        $record = $this->model->findOrFail($id);
        $record->fill(Input::all());
        $record->owner_id = Session::get('owner_id');   

        if ( $record->save() ) $record->result = TRUE;
        return $record;
    }

    public function destroyRecord($id = FALSE)
    {
        die('The destroy method has not been created yet - see Dashbpard\Repo\Eloquent\Eloquentrepo');
    }

   
}