<?php namespace Dashboard\Repositories;

use Auth;
use Input;
use DB;
use Datatable;
use Chumper\Datatable\Columns\TextColumn;
// use Bllim\Datatables\Datatables;
use Dashboard\Repositories\RepositoryInterface;

/**
 * This class interacts with Eloquent to serve the Base Controller (via the injected interface)
 */

class EloquentRepository implements RepositoryInterface {

    /** 
     * Holds the model object ready for the query
     * @var obj
     */
    protected $q;

    /**
     * The result to return to the controller
     * @var various
     */
    protected $r;

    /**
     * Can be overidden in the models or the URL - define what cols to retreive
     * @var array or '*'
     */
    protected $selectCols = array('id', 'owner_id');

    /**
     * Identifes the datatble name (allows us to write custom functions in each model class)
     * @var string
     */
    protected $datatableName = '';

    
    public function __construct($model)
    {
        // Set up model and the SELECT portion of the query
        $this->model = $model;

        // $this->q is the query
        $this->q = $this->model->onlyOwners();

        // Set the cols varaible (this determines what cols are being retrived)
        $this->setCols();
    }



    /*
    |--------------------------------------------------------------------------
    | Retreive Collections
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */
   
    /**
     * Gets all records and if URL has datatable=true, fomrats as datatable json
     * @return  JSON
     */
    public function all()
    {
        # If its not a datatable request, then just do a straight get()
        if ( ! $this->r = $this->getDatatable('all') )
            $this->r = $this->q->get( $this->selectCols );
        
        return $this->r;
    }

    protected function getDatatable($name, $queryType = 'query')
    {
        if ( Input::has('datatable') )
        {
            $this->datatableName = $name;
            return $this->makeDatatable($queryType);
        }
        else return FALSE;
    }
    
    /**
     * Gets all records related to the record with id
     *  and if URL has datatable=true, formats as datatable json
     * @return  JSON
     */
    public function getRelated($id, $relatedModel, $with)
    {
        
        # Set up the query (using the findOrFail() method below)
        $this->q = $this->findOrFail($id, $with)->$relatedModel;

        # If its not a datatable request, then just do a straight get()
        if ( ! $this->r = $this->getDatatable($relatedModel, 'collection') )
            $this->r = $this->q;
        
        return $this->r;
        
        # Is it a datatable request?
        // if ( Input::has('datatable') )
        // {
        //     $this->datatableName = $relatedModel;
        //     return $this->makeDatatable('collection'); // Its a collection, not query
        // }
        // else return $this->q;
    }

    /**
     * Retrives a collection based on the query that's been built
     * (You can run $this->where() to constrain the query)
     * @return colection 
     */
    public function get()
    {
        return $this->q->get($this->selectCols);
    }

    /**
     * Returns a list of value pairs for a dropdown menu
     * @param  string $colValue The value to return (e.g. product_title)
     * @param  string $colKey   Defaults to id - no need ot change this usually
     * @return array           A key=>value array 
     */
    public function lists($colValue, $colKey = 'id')
    {
        return $this->q->lists($colValue, $colKey);
    }
    

    /*
    |--------------------------------------------------------------------------
    | Retreive Models
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */

    /**
     * Finds a model with id=$id, and if we pass a 'with' value
     * eager loads those values too
     * @param  int  $id   id of the model
     * @param  boolean or string $with The related model(s) to eager load
     * @return JSON        
     */
    public function find($id, $with = FALSE)
    {
        return $this->findOrFail($id, $with);
    }

    /**
     * Finds a model with id=$id, and if we pass a 'with' value
     * eager loads those values too
     * @param  int  $id   id of the model
     * @param  boolean or string $with The related model(s) to eager load
     * @return JSON        
     */
    public function findOrFail($id, $with = FALSE)
    {
        if ( $with ) return $this->q->with( $with )->findOrFail( $id );
        else return $this->q->findOrFail( $id );
    }

    public function firstOrFail()
    {
        //tyo be built out
    }

    /**
     * Finds the first model where=$where, and if we pass a 'with' value
     * eager loads those values too
     * @param  int  $id   id of the model
     * @param  boolean or string $with The related model(s) to eager load
     * @return JSON        
     */
    // public function firstOrFail($where = array(), $with = FALSE)
    // {
    //     extract($where);
    //     # Set up the query
    //     $this->q = $this->model->onlyOwners()->where( (string)$where);
        
    //     if ( $with ) return $this->q->with( $with )->firstOrFail();
    //     else return $this->q->firstOrFail();

    //     # Set up the query
    //     // $this->q = $this->model->onlyOwners()->where($where);
    //     // return $this->q->firstOrFail();
    // }

    

    public function first()
    {
        // $this->
        return $this->q->first();
    }

    public function pluck($colName)
    {
        return $this->q->pluck($colName);
    }

    
    /*
    |--------------------------------------------------------------------------
    | Create, Update, or Delete multiple records
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */
    // things like insertall

     /*
    |--------------------------------------------------------------------------
    | Create, Update, or Delete individual records
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */
     public function createRecord()
    {
        // 1. Create new object and fill it with $_POST ($fillable is set)
        $this->q = new $this->model( Input::all() );

        // 2. Set the owner_id
        //$this->q->owner_id = Auth::user()->owner_id;       

        // 2. Now save it and set a success flag
        // if ( $this->q->save() ) $this->q->result = TRUE;
        $this->q->result = $this->q->save();

        return $this->q;
    }


    public function updateRecord($id = FALSE)
    {
        // 1. Find the model & fill with $_POST (protected with $fillable)
        $this->q = $this->model->findOrFail( $id );
        $this->q->fill( Input::all() );
        //$this->q->owner_id = Auth::user()->owner_id;   

        // 2. Save the new model and set a success flag
        // if ( $this->q->save() ) $this->q->result = TRUE;
        $this->q->result = $this->q->save();

        return $this->q;
    }


    public function destroyRecord($id = FALSE)
    {
        die('The destroy method has not been created yet - see Dashbpard\Repo\Eloquent\Eloquentrepo');
    }



    /*
    |--------------------------------------------------------------------------
    | Query Builder Methods
    |--------------------------------------------------------------------------
    |
    | Redfine some main Eloquent methods to restrict to tenant's records only 
    |
    */
    
    /**
     * Overwrites the $selectCols array with any passed in the URL 
     * (using cols={CSV} ), or if none passed, look in the model class 
     */
    public function setCols()
    {
        # Do we have a 'cols' array in the URL?
        if ( $input = Input::get('cols') ) $this->selectCols = explode(',', $input);

        # if not, the do we have one set in the model?
        elseif ( isset($this->model->selectCols) ) $this->selectCols = $this->model->selectCols;
    }
   
        























    /*
    |--------------------------------------------------------------------------
    | Helper methods
    |--------------------------------------------------------------------------
    |
    | Methods that support the main eloquent methods 
    |
    */

    public function setDataTableOptions($queryType)
    {
        if ( isset($this->dataTableOptions[$queryType]) )
            $this->dataTableOptions = $this->dataTableOptions[$queryType];
    }


    /**
     * uses either a query or a collection to create a datatable
     * @param  string $type either 'query' or 'collection'
     * @return json  Json in the format that datatables can consume
     */
    public function makeDatatable($type = 'query')
    {
        //Set up the type
        $this->datatable = Datatable::$type($this->q);

        // Now set up the columns to retrieve search by and order by
        $this->datatable->showColumns($this->selectCols)
            ->searchColumns($this->selectCols)
            ->orderColumns($this->selectCols);

        // Add any custom columns
        $this->addCustomColumns( $this->datatableName );

        return $this->datatable->make();
    }


    /**
     * Do not delete! This is overwritten in each model's repo.
     * @param string $tableName The name of the table
     */
    protected function addCustomColumns( $tableName )
    {
        //can be overwritten in each repo
    }



   












   

   
   /****************** RESTful CRUD methods *******************/
 
    // public function findRecord($id, $with = false)
    // {
    //     if (is_subclass_of($this->model, 'BaseModel'))
    //         $this->model->whereOwnerId(Auth::user()->owner_id);

    //     // If we've passed $with array then eager load
    //     if ( $with ) return $this->model->with($with)->findOrFail( $id );
    //     else return $this->model->findOrFail( $id );
    // }

   










    /*********************** general Mehtods for data handling *******************/


    // public function findAll()
    // {
    //     if (is_subclass_of($this->model, 'BaseModel'))
    //         return $this->model->whereOwnerId(Auth::user()->owner_id)->get();
    //     return $this->model->all();
    // }

    
    // public function dropdown($label)
    // {
    //     return $this->model->onlyOwners()->lists($label,'id');
    // }








    /**
     * Get all records, using URL params to constrain
     * @param  boolean $dataTable Pass to datatables?
     * @return array The artay of results that match the query
     */
    // public function getAll($dataTable = TRUE)
    // {
    //     $this->setCols();
    //     return $this->getResult($dataTable);
    // }

    // public function getFor($dataTable = TRUE)
    // {
    //     $this->setCols();
    //     if ( $contact_id = Input::get('contact_id') ) $this->q->where('contact_id', $contact_id);
    //     if ( $sortASC = Input::get('sortASC') ) $this->q->orderBy($sortASC, 'asc');
    //     if ( $sortDESC = Input::get('sortDESC') ) $this->q->orderBy($sortDESC, 'desc');
    //     return $this->getResult($dataTable);
    // }

    // public function getPivot($dataTable = TRUE)
    // {
    //     $this->setCols();
    //     $otherTable = Input::get('otherTable');

    //     // Return the results
    //     $this->q->$otherTable;
    //     dump($this->model->get());
    //     return;

    //     if ( $contact_id = Input::get('contact_id') ) $this->q->where('contact_id', $contact_id);
    //     if ( $sortASC = Input::get('sortASC') ) $this->q->orderBy($sortASC, 'asc');
    //     if ( $sortDESC = Input::get('sortDESC') ) $this->q->orderBy($sortDESC, 'desc');
    //     return $this->getResult($dataTable);
    // }


   
    // /**
    //  * Sets up the 'select' portioncof the query (from $_GET['cols'] params)
    //  */
    // public function setCols1($cols = FALSE)
    // {
    //     // we can pass the cols as array, or get from Input
    //     if ( ! $cols )
    //     {
    //         if ( $input = Input::get('cols') ) $cols = explode(',', $input);
    //         else $cols = array('id'); 
    //     }

    //     // Format dates
    //     foreach ($cols as $k => $col)
    //     {
    //         switch ($col) {
    //             case 'created_at':
    //             case 'updated_at':
    //                 $cols[$k] = DB::raw('DATE_FORMAT(' . $col . ', \'%d/%m/%Y, %H\:%i\') AS ' . $col);
    //                 break;
                
    //             case 'date_of_birth':
    //             case 'order_date':
    //                 $cols[$k] = DB::raw('DATE_FORMAT(' . $col . ', \'%d/%m/%Y\') AS ' . $col);
    //                 break;
    //         }

    //     } 

    //     // Add in the id if its not already
    //     if ( ! in_array('id', $cols) ) array_unshift($cols, 'id');

    //     //Set up  the query object
    //     $this->q = $this->model->select($cols);
    // }

    
    // /**
    //  * handles the query and returns results 
    //  * @param  [type] $dataTable [description]
    //  * @return [type]            [description]
    //  */
    // public function getResult($dataTable)
    // {
    //     $this->q->where('owner_id', Auth::user()->owner_id);

    //     // if its datatable then run it through Datatables class
    //     if ( $dataTable ) $result = Datatables::of($this->q)->make();
    //     else $result = $this->q->get();

    //     return $result;
    // }

   
}