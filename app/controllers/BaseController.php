<?php

// use Illuminate\Routing\Route;

class BaseController extends Controller {

    /**
     * Repository for this model
     * @var obj
     */     
    protected $repo;

    /**
     * Model object
     * @var obj
     */
    protected $record;

    /**
     * Array of the namespace, class & method
     * Usually:
     *     array('Dashboard, {namespace}, {controller}, {method}') 
     * @var array
     */
    protected $classAttributes;

    /**
     * Define what other records to retrieve
     * @var string
     */
    protected $with = NULL;

    /**
     * Sets up hooks for within a method
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
        // Set up repo & define class attr
        $this->repo = $repo;
        $this->setClassAttributes();
        
        // Define the request type
        if ( Request::ajax() || strtolower(Request::segment(1)) == 'api' ) 
            $this->asJson = TRUE;

        // dump($this->classAttributes);
    }

    
    /**
     * Display the listing page of the resource (note records are retrived via Ajax).
     *
     * @return Response
     */
    public function index()
    {
        $this->record = $this->repo->all();

        # Fire event & render view
        $this->fireEvent();
        return $this->handleResponse(TRUE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->record = $this->repo->model;

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
        $this->record = $this->repo->createRecord();

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
        $this->record = $this->repo->find($id, $this->with);

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
        $this->record = $this->repo->find($id, $this->with);

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
        $this->record = $this->repo->updateRecord($id);
        
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
    


    /****************** Other m,ethods ****************/
    public function getRelated($id, $relatedModel, $with = FALSE)
    {
        // Get this model and its related models
        $this->record = $this->repo->getRelated($id, $relatedModel, $with);
        $this->fireEvent();
        return $this->handleResponse();
    }





/***************** View & Routing methods ****************/

    protected function setClassAttributes()
    {
        // Explode the namespace
        $t = explode('Controller@' ,Route::currentRouteAction());
        $t['exploded'] = explode('\\', $t[0]);

        // Build the array
        foreach ( $t['exploded']  as $att )
        {
            $this->classAttributes[] = strtolower($att);
        }

        // Put it all together
        array_push($this->classAttributes, strtolower($t[1]));
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
        $this->record->eventResponse = Event::fire( $event, $this->record );

        # HOOK: Do we have any postEvent methods to perform?
        if ( isset( $this->postEvent[$this->classAttributes[3]]) ) 
            $this->{$this->postEvent[$this->classAttributes[3]]}();
    }


    protected function handleResponse($viewFile = 'edit')
    {
        # Is it a json request?
        if ( $this->asJson ) $retval = $this->record;

        # OK, must be a request from the application
        else
        {
            # If we have tried to save(), and it was successful, redirect to edit page
            if ( isset($this->record->result) && $this->record->result === TRUE )
                $retval = Redirect::route('app.' . $this->classAttributes[2] . '.' . $viewFile, array($this->record->id))->with('success', 'That\'s saved!');

            # elseif we have tried to save(), and it was NOT successful, go back and show errors
            elseif ( isset($this->record->result) && $this->record->result === FALSE )
                $retval = Redirect::back()
                    ->with('error', 'Some fields don\'t look right. Can you take a look?')
                    ->withErrors($this->record->errors())
                    ->withInput();

            # Else just return the view
            else $retval = $this->renderView($viewFile);
        }
        
        return $retval;
    }
    

    /**
     * This method looks for a custom view and if none found, returns the default view
     * @return returns a view
     */
    protected function renderView()
    {
        # Check to see if we have a custom view for this client/tenant
        $filePath =  $this->classAttributes[1] . '::defaults.' . $this->classAttributes[2] . '.' . $this->classAttributes[3];
        $customFilePath = str_replace('defaults', Auth::user()->owner_id, $filePath);

        # If file exists in tenants dir, load that, otherwise load default
        if ( View::exists( $customFilePath ) ) $filePath = $customFilePath;
        return View::make( $filePath )->withRecord( $this->record );
    }






























    // public function redirect($viewFile = 'edit')
    // {
    //     // If save is successful, then redirect to the $viewFile page
    //     if ( $this->record->result )
    //     {
    //         if ( Request::ajax() ) return Response::make($this->record, 200); 
            
    //         else 
    //             return Redirect::route('app.' . strtolower(Request::segment(2)) . '.' . $viewFile, array($this->record->id))
    //                 ->with('success', 'That\'s saved!'); 
    //     }
             

    //     // ... else go back and show errors
    //     else
    //     {
    //         if ( Request::ajax() ) 
    //             return Response::make($this->record->errors(), 500);

    //         else 
    //             return Redirect::back()
    //             ->with('error', 'Some fields don\'t look right. Can you take a look?')
    //             ->withErrors($this->record->errors())
    //             ->withInput();
    //     }

    // }

}