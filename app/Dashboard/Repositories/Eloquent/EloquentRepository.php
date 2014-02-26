<?php namespace Dashboard\Repositories;

use Auth, Config, Request, App, Session;

/**
 * This class interacts with Eloquent to serve the Base Controller (via the injected interface)
 */

abstract class EloquentRepository {

    // Basic RESTful methods    
    public function getAll($params = array())
    {
        if ( count($params) )
        {
            // Set up the params
            $deleteme = 'nothing';
        }
            
        else return $this->model->all();
    }


    public function findRecord($id)
    {
        return $this->model->findOrFail($id);
    }


    public function createRecord()
    {
        $record = $this->model;

        if ( $record->save() ) return $record->id;

        else return $record;
    }

    public function updateRecord($id = FALSE)
    {
        $record = $this->model->findOrFail($id);

        if ( $record->save() ) return $record->id;

        else return $record;
    }
}