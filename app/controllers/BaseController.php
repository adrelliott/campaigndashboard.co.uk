<?php

/**
 * BaseController's only job is to set up before/after filters and return a view
 *
 * We use a CrudController to deal with all CRUD functions that extends this class
 */

use Dashboard\Services\DatatableService;

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
        // See also config/packages/anahkiasen/
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
//        $ownerId = $this->fetchOwnerId(); DO WE NEED THIS HERE.............................?
        $path = $this->classAttributes[2] . '.' . $this->classAttributes[3];

        return $this->render($path)->withModel($model);
    }

    protected function render($path)
    {
        $ownerId = $this->fetchOwnerId();
        $filePath = $this->classAttributes[1] . '::defaults.' . $path;

        if ($ownerId)
        {
            $customFilePath = str_replace('defaults', $ownerId, $filePath);
            if ( View::exists( $customFilePath ) ) $filePath = $customFilePath;
        }

        return View::make( $filePath );
    }

    public function handleDatatable()
    {
        list( $results, $total ) = 
            with( new DatatableService(Input::getFacadeApplication()['request'], $this->repo) )->run();

        return $this->render($this->classAttributes[2] . '._row_json')
            ->withTotal($total)
            ->withDraw((int)Input::get('draw'))
            ->withResults($results);
    }

    protected function fetchOwnerId()
    {
        // Are we a logged in user? If we're not, check on the model
        // for an owner ID. There might be one there.
        if (Auth::user()->user())
            $ownerId = Auth::user()->user()->owner_id;
        elseif ($model && isset($model->owner_id) && $model->owner_id)
            $ownerId = $model->owner_id;
        else
            $ownerId = FALSE;

        return $ownerId;
    }
}