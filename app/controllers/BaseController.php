<?php

class BaseController extends Controller {

	public function __construct()
    {
        if ( ! Auth::guest() )
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
        $this->data['misc']['current_route'] = strtolower(Request::segment(1));
        $this->data['misc']['env'] = App::environment();

        Session::put('owner_id', $this->user->owner_id);
        //$this->user->config = Config::get('client_config/' . $this->user->slug);

        // $this->data['user'] = $this->user;    
        }
        
    }


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