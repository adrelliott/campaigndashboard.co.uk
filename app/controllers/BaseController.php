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
                    'route' => 'dashboard',
                    'icon' => 'tachometer',
                    'label' => 'Dashboard',
                    'dropdowns' => array(),
                    ),
                'contacts' => array(
                    'route' => 'contacts',
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
                            'route' => '',
                            'icon' => 'briefcase',
                            'label' => 'Leads'
                            ),
                        'dropdown2' => array(
                            'route' => '',
                            'icon' => 'gbp',
                            'label' => 'Orders'
                            ),
                        ),
                    ),
                'marketing' => array(
                    'route' => '',
                    'icon' => 'bolt',
                    'label' => 'Marketing',
                    'dropdowns' => array(
                        'dropdown1' => array(
                            'route' => '',
                            'icon' => 'bullhorn',
                            'label' => 'Broadcasts'
                            ),
                        ),
                    ),
                )
            );


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

    public function render($template = FALSE)
    {
        if ( !$template )
        {
            $t = explode('Controller@' ,Route::currentRouteAction());
            $template = strtolower($t[0] . '/' . $t[1]);
        }

        if (file_exists('views/' . $this->user->owner_id . '/' . $template . '.php'))
        {
            $template = $this->user->owner_id . '/' . $template;
        }
        else $template = 'defaults/' . $template;

        return View::make($template, $this->data);
    }

}