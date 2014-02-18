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
                    'label' => 'Fans',
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

        Session::put('owner_id', $this->user->slug = $this->user->owner_id);
        $this->user->config = Config::get('client_config/' . $this->user->slug);

        $this->data = array('specialData' => 'yeah!',
            'user' => $this->user);
    }


    /* Standard Methods */
    // public function saveRecord($record)
    // {
    //     if ($record->save())
    //     {
    //         return Redirect::route('app.' . $this->foldername . '.edit', array($record->id))
    //             ->with('success', 'That\'s saved!');
    //     }

    //     else
    //     {
    //         return Redirect::back()
    //             ->with('error', 'Some fields don\'t look right. Can you take a look?')
    //             ->withErrors($record->errors());
    //     }
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