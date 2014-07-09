<?php

/**
 * BaseController's only job is to set up before/after filters and return a view
 *
 * We use a CrudController to deal with all CRUD functions that extends this class
 */

class BaseController extends Controller {

    /**
     * Array of the namespace, class & method
     * Usually:
     *     array('Dashboard, {namespace}, {controller}, {method}') 
     * @var array
     */
    public $classAttributes;
    

    public function __construct()
    {
        // Set class atrributes (creates ['namespace' => {namespace}, 'class' => {classname}])
        $this->setClassAttributes();

        // Defaults for before and after
        $this->beforeFilter('@before');
        $this->afterFilter('@after');
    }

    // Shells
    public function before($route, $request) { }
    public function after($route, $request) { }

    /**
     * Creates an array of className, namespace & method
     */
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
     * This method looks for a custom view and if none found, returns the default view
     * @return returns a view
     */
    protected function renderView($data = NULL)
    {
        # Check to see if we have a custom view for this client/tenant
        $filePath =  $this->classAttributes[1] . '::defaults.' . $this->classAttributes[2] . '.' . $this->classAttributes[3];
        $customFilePath = str_replace('defaults', Auth::user()->owner_id, $filePath);

        # If file exists in tenants dir, load that, otherwise load default
        if ( View::exists( $customFilePath ) ) $filePath = $customFilePath;
        return View::make( $filePath )->withData( $data );
    }


}