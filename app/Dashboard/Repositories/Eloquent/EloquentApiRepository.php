<?php namespace Dashboard\Repositories;

use Auth, Session, Input;

/**
 * This class interacts with Eloquent to serve the Base Controller (via the injected interface)
 */

abstract class EloquentApiRepository {

    
    /**
     * List of acceptible Input parameters
     * @var [type]
     */
    protected $params = ['where', 'limit'];




    public function getAll($params = array())
    {
        // set up params
        if ( count($params) ) $this->formatParams($params);

        return $this->model->where('owner_id', Auth::user()->owner_id)->get();
    }
    
    //  url.com/resource?fields=email,id,

    public function formatParams($params)
    {
        // loop through all params
        foreach ( $params as $p => $v )
        {
            switch ($p)
            {
                case 'fields':
                    $r['fields'] = explode(',', $v);
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }


    public function findRecord($id)
    {
        return $this->model->findOrFail($id);
    }


    public function createRecord()
    {
        // 1. Create new object and fill it with $_POST ($fillable is set)
        $record = new $this->model(Input::all());
        $record->owner_id = Session::get('owner_id');       

        // 2. Now save it and set a success flag
        if ( $record->save() ) $record->result = TRUE;

        return $record;
    }


    public function updateRecord($id = FALSE)
    {
        // 1. Find the model & fill with $_POST (protected with $fillable)
        $record = $this->model->findOrFail($id);
        $record->fill(Input::all());
        $record->owner_id = Session::get('owner_id');   

        // 2. Save the new model and set a success flag
        if ( $record->save() ) $record->result = TRUE;
        return $record;
    }


    public function destroyRecord($id = FALSE)
    {
        die('The destroy method has not been created yet - see Dashbpard\Repo\Eloquent\Eloquentrepo');
    }

   
}