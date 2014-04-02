<?php

// use Illuminate\Routing\Route;

class BaseController extends Controller {

    protected $repo;

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



    public function __construct($repo = NULL)
    {
        $this->repo = $repo;
        $this->setClassAttributes();
        
        // dump($this->classAttributes);
    }

    
    /**
     * Display the listing page of the resource (note records are retrived via Ajax).
     *
     * @return Response
     */
    public function index()
    {
        $this->record = $this->repo->model;

        # Fire event & render view
        $this->fireEvent();
        return $this->renderView();
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
        return $this->renderView()->withRecord($this->record); // Wraps in presenter
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
        return $this->redirect();
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
        $this->record = $this->repo->findRecord($id, $this->with);

        # Fire event & render view
        $this->fireEvent();
        return $this->renderView('edit')->withRecord($this->record);
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
        $this->record = $this->repo->findRecord($id, $this->with);

        # Fire event & render view
        $this->fireEvent();
        return $this->renderView()->withRecord($this->record);
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
        return $this->redirect();
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
        return $this->redirect();
        // where's my view???
    }
    







    public function getAll()
    {
        // Get all results (pass 'true' to use Bllim\DataTables class)
        return $this->repo->getAll(TRUE);
    }
    
    public function getFor()
    {
        // Get all results (pass 'true' to use Bllim\DataTables class)
        return $this->repo->getFor(TRUE);
    }










/***************** View & Routing methods ****************/

    public function setClassAttributes()
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
    public function fireEvent()
    {
        $event = join('.', $this->classAttributes);
        $retval = Event::fire( $event, $this->record );

        # Turn into a readable array
        // $this->record->eventResponse = $retval[0];

        # HOOK: Do we have any postEvent methods to perform?
        if ( isset( $this->postEvent[$this->classAttributes[3]]) ) 
            $this->{$this->postEvent[$this->classAttributes[3]]}();
    }
    

    /**
     * This method prepares to render the view by:
     * 1. Firing an event (like queuing an email, or querying some tables)
     * 2. Runs any other methods that are defined in the 
     * @return [type] [description]
     */
    public function renderView()
    {
        # Check to see if we have a custom view for this client/tenant
        $filePath =  $this->classAttributes[1] . '::defaults.' . $this->classAttributes[2] . '.' . $this->classAttributes[3];
        $customFilePath = str_replace('defaults', Auth::user()->owner_id, $filePath);

        # If file exists in tenants dir, load that, otherwise load default
        if ( View::exists( $customFilePath ) ) $filePath = $customFilePath;
        return View::make( $filePath );
    }



    public function redirect($viewFile = 'edit')
    {
        // If save is successful, then redirect to the $viewFile page
        if ( $this->record->result )
        {
            if ( Request::ajax() ) return Response::make($this->record, 200); 
            
            else 
                return Redirect::route('app.' . strtolower(Request::segment(2)) . '.' . $viewFile, array($this->record->id))
                    ->with('success', 'That\'s saved!'); 
        }
             

        // ... else go back and show errors
        else
        {
            if ( Request::ajax() ) 
                return Response::make($this->record->errors(), 500);

            else 
                return Redirect::back()
                ->with('error', 'Some fields don\'t look right. Can you take a look?')
                ->withErrors($this->record->errors())
                ->withInput();
        }

    }

}