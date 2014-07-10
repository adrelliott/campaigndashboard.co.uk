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

        // Set up Former
        Former::framework('TwitterBootstrap3');
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
    protected function renderView(BaseModel $model = NULL)
    {
        // Are we a logged in user? If we're not, check on the model
        // for an owner ID. There might be one there.
        if (Auth::user())
            $ownerId = Auth::user()->owner_id;
        elseif ($model && isset($model->owner_id) && $model->owner_id)
            $ownerId = $model->owner_id;
        else
            $ownerId = FALSE;

        # Check to see if we have a custom view for this client/tenant
        if ($ownerId)
        {
            $filePath =  $this->classAttributes[1] . '::defaults.' . $this->classAttributes[2] . '.' . $this->classAttributes[3];
            $customFilePath = str_replace('defaults', $ownerId, $filePath);

            # If file exists in tenants dir, load that, otherwise load default
            if ( View::exists( $customFilePath ) ) $filePath = $customFilePath;
        }

        // Load the view
        return View::make( $filePath )->withModel( $model );
    }
}