<?php

// use Illuminate\Routing\Route;

class BaseController extends Controller {

    protected $repo;

    protected $record;

    protected $viewPath = '{MODULE}::{PATH}.{CONTROLLER}.{METHOD}';
    

    public function __construct($repo = NULL)
    {
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
        return $this->render()->withRecord($this->repo->model); // Wraps in presenter
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

    public function buildPath($find, $replace)
    {
        $this->viewPath = str_replace($find, strtolower($replace), $this->viewPath);
    }


    public function render($viewFile = FALSE)
    {
        //Get get current method - this is the viewfile (unless overidden)
        $t = explode('Controller@' ,Route::currentRouteAction());
        if ( ! $viewFile ) $viewFile = $t[1];
        $this->buildPath('{METHOD}', $viewFile);

        // now set the rest of the paths
        $t = explode('\\', $t[0]);
        $owner_id = Auth::user()->owner_id;
        $this->buildPath('{MODULE}', $t[1]);
        $this->buildPath('{CONTROLLER}', $t[2]);
        $this->buildPath('{PATH}', $owner_id);

        // Look for a custom file & set as defaults if none found
        if ( ! View::exists( $this->viewPath ) ) $this->buildPath($owner_id, 'defaults');

        return View::make($this->viewPath);
    }


    public function redirect($viewFile = 'edit')
    {
        // If save is successful, then redirect to the $viewFile page
        if ( $this->record->result )
        {
            // if ( Request::ajax() ) return Response::make($this->record, 200); 
            if ( Request::ajax() ) return Response::make($this->record, 200); 
            else return Redirect::route('app.' . strtolower(Request::segment(2)) . '.' . $viewFile, array($this->record->id))
                    ->with('success', 'That\'s saved!'); 
        }
             

        // ... else go back and show errors
        else
        {
            if ( Request::ajax() ) return Response::make($this->record, 500);

            else return Redirect::back()
                ->with('error', 'Some fields don\'t look right. Can you take a look?')
                ->withErrors($this->record->errors())
                ->withInput();
        }

    }




























//   public function render_old($viewFile = FALSE)
//     {
//         // This si the pattern of the view path
//         // $this->viewPath = '{MODULE}::{PATH}.{CONTROLLER}.{METHOD}';

//         //Get get current method - this is the viewfile (unless overidden)
//         $t = explode('Controller@' ,Route::currentRouteAction());
//         if ( ! $viewFile ) $viewFile = $t[1];
//         $this->buildPath('{METHOD}', $viewFile);
//         //$viewPath = str_replace('{METHOD}', strtolower($viewFile), $viewPath);

//         // now set the rest of the paths
//         $t = explode('\\', $t[0]);
//         $owner_id = Auth::user()->owner_id;
//         // $viewPath = str_replace('{MODULE}', strtolower($t[1]), $viewPath);
//         $this->buildPath('{MODULE}', $t[1]);
//         $this->buildPath('{CONTROLLER}', $t[2]);
//         $this->buildPath('{PATH}', $owner_id);
//         // $viewPath = str_replace('{CONTROLLER}', strtolower($t[2]), $viewPath);

//         // Look for a custom file & set as defaults if none found
//         // $view = str_replace('{PATH}', Auth::user()->owner_id, $viewPath );
//         // if ( ! View::exists( $view ) ) $view = str_replace('{PATH}', 'defaults', $viewPath );
//         if ( ! View::exists( $this->viewPath ) ) $this->buildPath($owner_id, 'defaults');

//         return View::make($this->viewPath);

       
// //        dd($view);

// // dd( View::exists( strtolower('Crm::defaults.contacts.index') ) );

// //         // Do we have a custom file?
// //         if ( ! View::exists($view = $view['module'] . '.' . Auth::user()->owner_id . '.' . $view['folder'] . '.' . $view['file'] ))
// //         {
// //             $view = $this->modulename . '::defaults.' . $path;
// //         }
        
// //         return View::make($view);
        

// //         dd($t);
        
// //         //module = namseapce, folder = controller, viewfile = method


// //         if ( ! $viewFile )
// //         {
// //             $t = explode('Controller@' ,Route::currentRouteAction());
// //             dd($t);
// //             $viewFile = $t[1];
// //         }

// //         $path = $this->foldername . '.' . $viewFile;

// //         //Test to see if it exists
// //         if ( ! View::exists($view = $this->modulename . '.' . Auth::user()->owner_id . '.' . $path))
// //         {
// //             $view = $this->modulename . '::defaults.' . $path;
// //         }
        
// //         return View::make($view);
// //         // return View::make($view, $this->data);
        
//     }
  
}