<?php

class BaseController extends Controller {

    protected $repo;

    protected $record;

    protected $user;
    
    // public function __construct($repo = NULL)
	public function __construct($repo = NULL)
    {
        // Set up view objects & repo
        if ( Auth::check() ) $this->setUpData(); //This is nasty
        $this->repo = $repo;
    }

    
    /**
     * Display the listing page of the resource (note records are retrived via Ajax).
     *
     * @return Response
     */
    public function index()
    {
       return $this->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->render()->withRecord($this->repo);
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
         return $this->render('edit')->withRecord($this->repo->findRecord($id));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->render()->withRecord($this->repo->findRecord($id));
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

     public function render($viewFile = FALSE)
    {
        //Get current controller name and method
        if ( ! $viewFile )
        {
            $t = explode('Controller@' ,Route::currentRouteAction());
            $viewFile = $t[1];
        }

        $path = $this->foldername . '.' . $viewFile;

        //Test to see if it exists
        if ( ! View::exists($view = $this->modulename . '::' . $this->user->owner_id . '.' . $path))
        {
            $view = $this->modulename . '::defaults.' . $path;
        }
        
        return View::make($view, $this->data);
        
    }


    public function redirect($viewFile = 'edit')
    {
        // If save is successful, then redirect to the $viewFile page
        if ( $this->record->result ) 
            return Redirect::route('app.' . $this->foldername . '.' . $viewFile, array($this->record->id))
                    ->with('success', 'That\'s saved!');  

        // ... else go back and show errors
        else return Redirect::back()
                ->with('error', 'Some fields don\'t look right. Can you take a look?')
                ->withErrors($this->record->errors())
                ->withInput();

    }

     /**
     * Yuuuuk. Nasty method to intialise our vars. this can be MUCH better
     */
    public function setUpData()
    {
        //Set up user var
        $this->user = Auth::user();
        $this->data['user'] = $this->user;
        
        //Set up environment vars
        $this->data['config'] = Config::get('client_config/' . $this->user->owner_id);
        $this->data['navbar'] = $this->data['config']['navbar'];
        $this->data['owner_id'] = $this->user->owner_id;
        $this->data['logo']['large'] = '/assets/img/bootstrap/cdash_logo150px.png';
        $this->data['logo']['small'] = '/assets/img/bootstrap/cdash_logo75px.png';
        $this->data['controller'] = strtolower(Request::segment(2));
        $this->data['misc']['env'] = App::environment();

        Session::put('owner_id', $this->user->owner_id);
    }

    

   
}