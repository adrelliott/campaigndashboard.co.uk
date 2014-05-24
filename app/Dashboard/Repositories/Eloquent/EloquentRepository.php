<?php namespace Dashboard\Repositories;

// use Auth;
use Input;
// use DB;
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

        // Set the cols variable (this determines what cols are being retrieved)
        $this->setCols();


    }

    /**
     * Takes called method and adds scope of onlyOwners() to it.
     * @param  string $method Method name
     * @param  mixed $args   Supplied args
     */
    public function __call($method, $args)
    {
        // dd( implode(', ', $args));
        if ( ! method_exists($this, $method) ) 
            return call_user_func_array(array($this->q, $method), $args);
    }

    /*
    |--------------------------------------------------------------------------
    | Retrieve Collections
    |--------------------------------------------------------------------------
    |
    | Redefine some main Eloquent methods to restrict to tenant's records only
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

    public function getDatatable($name, $queryType = 'query')
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
        if ( $with ) $this->with( $with );

        # Get related model
        $this->q = $this->findOrFail($id)->$relatedModel;

        # If its not a datatable request, then just do a straight get()
        if ( ! $this->r = $this->getDatatable($relatedModel, 'collection') )
            $this->r = $this->q;

        return $this->r;
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

        // 2. Now save it and set a success flag
        $this->q->success = $this->q->save();
        $this->q->errors = $this->q->errors()->toArray();

        return $this->q;
    }


    public function updateRecord($id = FALSE)
    {
        // 1. Find the model & fill with $_POST (protected with $fillable)
        $this->q = $this->model->findOrFail( $id );
        $this->q->fill( Input::all() );  

        // 2. Save the new model and set a success flag
        $this->q->success = $this->q->save();
        $this->q->errors = $this->q->errors()->toArray();

        return $this->q;
    }


    public function destroyRecord($id = FALSE)
    {
        die('The destroy method has not been created yet - see Dashbpard\Repo\Eloquent\Eloquentrepo');
    }

   
        




    /*
    |--------------------------------------------------------------------------
    | Eloquent methods/Query Builder
    |--------------------------------------------------------------------------
    |
    | Over=ride eloquent methods here
    |
    */
   
    /**
     * Takes the eager loading params ad restricts to just tenant's records
     * @param  mixed $args The passed args
     */
    public function with($args)
    {
        # Get the passed args as an array
        $args = func_get_args();

        # Loop through each and apply the onlyOwners() constraint
        foreach ( $args as $arg )
        {
            $this->q->with(
                array($arg => function($query)
                {
                    $query->onlyOwners();
                })
            );
        }

        return $this->q;
    }



    /*
    |--------------------------------------------------------------------------
    | Helper methods
    |--------------------------------------------------------------------------
    |
    | Methods that support the main eloquent methods 
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


   
}