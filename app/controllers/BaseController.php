<?php

class BaseController extends Controller {

	public function __construct()
    {
        //This should come from the database when we draw the user record...
        $this->user = (object) array(
            'owner_id' => '10222',
            'first_name' => 'Al', 
            'id' => '2311',
            'logo_path' => '/assets/img/bootstrap/cdash_logo150px.png',
            'navbar' => array (
                'home' => array(
                    'route' => 'app/dashboard',
                    'icon' => 'tachometer',
                    'label' => 'Dashboard',
                    'dropdowns' => array(),
                    ),
                'contacts' => array(
                    'route' => 'app/contacts',
                    'icon' => 'user',
                    'label' => 'Contacts',
                    'dropdowns' => array(),
                    ),
                'sales' => array(
                    'route' => '',
                    'icon' => 'signal',
                    'label' => 'Sales',
                    'dropdowns' => array(
                        'dropdown1' => array(
                            'route' => 'opp/leads',
                            'icon' => 'briefcase',
                            'label' => 'Leads'
                            ),
                        'dropdown2' => array(
                            'route' => 'orders/orders',
                            'icon' => 'gbp',
                            'label' => 'Orders2'
                            ),
                        ),
                    ),
                'marketing' => array(
                    'route' => '',
                    'icon' => 'bolt',
                    'label' => 'Marketing',
                    'dropdowns' => array(
                        'dropdown1' => array(
                            'route' => 'email/broadcasts',
                            'icon' => 'bullhorn',
                            'label' => 'Broadcasts'
                            ),
                        ),
                    ),
                )
            );

        $this->user->slug = $this->user->owner_id;
        $this->user->config = Config::get('client_config/' . $this->user->slug);

        $this->data = array('specialData' => 'yeah!',
            'user' => $this->user);
    }


    /**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}



    /**
     * Render Function
     *
     * This function controlls the templating. It defaults to loading the view file named after the method located in the folder named after the controller, but can be overidden.
     *
     * E.g. if this is called in the index() method, within ContactsContoller, it auto-loads the view `views/defaults/contacts/index.blade.php'. You can overide this by passing $view and $folder vars
     *
     * NOTE: The method also searches for a client-specific view first, in views/{client_id}/{controller_name}/{method_name}.blade.php first. if this is not found, then it loads views/defaults/{controller_name}/{method_name}.blade.php 
     *
     * @return view
     * @author Al Elliott
     **/
    // public function render2($view = FALSE, $folder = FALSE)
    // {

    //     $t = explode('Controller@' ,Route::currentRouteAction());
    //     if ( !$folder ) $folder = strtolower($t[0]);
    //     if ( !$view ) $view = strtolower($t[1]);
       
    //     if (file_exists(app_path('views/' . $this->user->owner_id . '/' . $folder . '/' . $view . '.blade.php')))
    //     {
    //         $view = $this->user->owner_id . '/' . $folder . '/' . $view;
    //     }
    //     else $view = 'defaults/' . $folder . '/' . $view;

    //     return View::make($view, $this->data);
    // }

    


    public function render()
    {
        //Get current controller name and method
        $t = explode('Controller@' ,Route::currentRouteAction());
        $path = $this->foldername . '.' . $t[1];

        //Test to see if it exists
        if ( ! View::exists($view = $this->modulename . '::' . $this->user->owner_id . '.' . $path))
        {
            $view = $this->modulename . '::defaults.' . $path;
        }
        
        return View::make($view, $this->data);
        
    }

}