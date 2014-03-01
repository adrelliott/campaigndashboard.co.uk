<?php

class BaseController extends Controller {

    protected $repo;

    protected $result;

    protected $user;
    
    // public function __construct($repo = NULL)
	public function __construct($repo = NULL)
    {
        // Set up view objects & repo
        if ( Auth::check() ) $this->setUpData();
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
        // Try to create the record. If it fails, $this->record holds val errors
        $this->record = $this->repo->createRecord();

        // Now pipe to the right methods
        if ($this->record->result) return $this->success();
        else return $this->fail();
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
        $this->record = $this->repo->updateRecord($id);
        
        // Now pipe to the right methods
        if ($this->record->result) return $this->success();
        else return $this->fail();
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




    /************** Other Base Methods **************/
     public function setColumn($array = array())
    {
        dd('this ise set col:');
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


    /**
     * Redirect upon successful method result
     * @param  string $viewFile The name of the view to direct to (usally edit or index)
     */
    public function success($viewFile = 'edit')
    {
        if (Request::ajax()) //Horrible hack!
        {
            return Response::make('', 200, array('Content-Type' => 'text/plain'));
        }
            
        else
        {
            return Redirect::route('app.' . $this->foldername . '.' . $viewFile, array($this->record->id))
                    ->with('success', 'That\'s saved!');  
        }
    }
    
    /**
     * Go back ot form if the method result is a fail
     */
    public function fail()
    {
        if (Request::ajax())  //Horrible hack!

        {
            return Response::make('', 500, array('Content-Type' => 'text/plain'));
        }
        else 
        {
            return Redirect::back()
                ->with('error', 'Some fields don\'t look right. Can you take a look?')
                ->withErrors($this->record->errors())
                ->withInput();
        }
    }

    


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