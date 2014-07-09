<?php


class CrudController extends BaseController {

    /**
     * Repository for this model
     * @var obj
     */     
    protected $repo;

   
     /**
     * Data object for the view
     * @var obj
     */
    protected $data;

     /**
     * Model object
     * @var obj
     */
    protected $model;

    /**
     * Define what other records to retrieve
     * @var string
     */
    protected $with = NULL;

    /**
     * Sets up hooks for within a method
     * (set this in the sub-controller classes)
     * @param array $postEvent 
     */
    protected $postEvent = array();

     /**
     * What type of request is it?
     * (defaults to NULL, allowing us to assume its a request within normal flow of app)
     * @var string
     */
    protected $asJson = FALSE;


    public function __construct($repo = NULL)
    {
        parent::__construct();

        // Set up data object, model and repo
        $this->data = new stdClass();
        $this->model = $this->repo = $repo;
    }

    
    /**
     * Display the listing page of the resource (note records are usually retrieved via Ajax).
     *
     * @return Response
     */
    public function index()
    {
        # Fire event & render view
        $this->fireEvent();
        return $this->handleResponse();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       # Fire event & render view
        $this->fireEvent();
        return $this->handleResponse();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //Try to store and pass result to redirect() method
        $this->model = $this->repo->createRecord();

        # Fire event & redirect
        $this->fireEvent();
        return $this->handleResponse();
    }


    /*
     * Display the specified resource. (Can we be used to show a non-editable record, e.g. if permissions are not adequate to edit)
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // Get the record (and associated records via with() )
        $this->model = $this->repo->find($id, $this->with);

        # Fire event & render view
        $this->fireEvent();
        return $this->handleResponse();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // Get the record (and associated records via with() )
        $this->model = $this->repo->find($id, $this->with);

        # Fire event & render view
        $this->fireEvent();
        return $this->handleResponse();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //Try to update and pass result to redirect() method
        $this->model = $this->repo->updateRecord($id);
        
        # Fire event & redirect
        $this->fireEvent();
        return $this->handleResponse();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Form submists as DELETE to contacts/$id
        
        # Fire event & redirect
        $this->fireEvent();
        return $this->handleResponse();
        // where's my view???
    }
    


    /****************** Other methods ****************/
    public function getRelated($id, $relatedModel, $with = NULL)
    {
        // Get this model and its related models
        $this->model = $this->repo->getRelated($id, $relatedModel, $with);
        $this->fireEvent();
        return $this->handleResponse();
    }

     /**
     * Fires an event. To subscribe:
     * 1. Register listener in app/events.php
     * 2. Set up handler class in app/Dashboard/Handlers
     * (note: Use one class per module)
     */
    protected function fireEvent()
    {
        // Construct event name and pass through a reference to $this
        $event = join('.', $this->classAttributes);
        $this->data->eventResponse = Event::fire( $event, $this->model );

        # HOOK: Do we have any postEvent methods to perform?
        if ( isset( $this->postEvent[$this->classAttributes[3]]) ) 
            $this->{$this->postEvent[$this->classAttributes[3]]}();
    }

   

    protected function handleResponse($viewFile = 'edit')
    {
        # Is it a json request?
        if ( $this->asJson ) $retval = $this->model;

        # OK, must be a request from the application
        else
        {
            # If we have tried to save() and it was successful, redirect to edit page
            if ( isset($this->model->success) && $this->model->success === TRUE )
                $retval = Redirect::route('app.' . $this->classAttributes[2] . '.' . $viewFile, array($this->model->id))->with('success', 'That\'s saved!');

            # elseif we have tried to save() and it was NOT successful, go back and show errors
            elseif ( isset($this->model->success) && $this->model->success === FALSE )
                $retval = Redirect::back()
                    ->with('error', 'Some fields don\'t look right. Can you take a look?')
                    ->withErrors($this->model->errors())
                    ->withInput();

            # Else dd $this->model into $this->data object and just return the view
            else
            {
                $this->data->model = $this->model;
                $retval = $this->renderView($this->data);
            }
        }
            
        return $retval;
    }




}