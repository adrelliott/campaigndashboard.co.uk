<?php

class BaseController extends Controller {

    protected $interface;
    
    protected $user;
    
	public function __construct($model = NULL)
    {
        if ( ! Auth::guest() ) $this->setUpData();
        $this->interface = $model;
    }

    /**
     * Display the index page (use Datatables to list resource)
     *
     * @return Response
     */
    public function indexNoData()
    {
        return $this->render('index');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->interface->getAll();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->render()->withRecord($this->interface);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {   
        $result = $this->interface->createRecord();
        return $this->saveRecord($result);
        // return $this->saveRecord($this->interface->createRecord());
    }

    /*
     * Display the specified resource. (Can we be used to show a non-editable record, e.g. if permissions are not adequate to edit)
     *
     * @param  int  $id
     * @return Response
     */
     
    public function show($id)
    {
         return $this->render('edit')->withRecord($this->interface->findRecord($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->render()->withRecord($this->interface->findRecord($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $result = $this->interface->updateRecord($id);
        return $this->saveRecord($result);
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






    public function saveRecord($result)
    {
        if ( is_int($result) )
        {
            if (Request::ajax()) 
            {
                return Response::make('', 200, array('Content-Type' => 'text/plain'));
            }
                
            else
            {
                return Redirect::route(
                        'app.' . $this->foldername . '.edit', 
                        array($result)
                    )
                    ->with('success', 'That\'s saved!');  
            } 
        }
        else
        {
            if (Request::ajax()) 
            {
                return Response::make('', 500, array('Content-Type' => 'text/plain'));
            }
            else 
            {
                return Redirect::back()
                ->with('error', 'Some fields don\'t look right. Can you take a look?')
                ->withErrors($result->errors())
                ->withInput();
            }
        }
    }











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