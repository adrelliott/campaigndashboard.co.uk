<?php

namespace Dashboard\App\Home;
use \Basecontroller;

class DashboardController extends BaseController {

    protected $modulename = 'dashboard';
    protected $foldername = 'dashboard';
	
    /**
	 * Just shows dashboard modules
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->render();
	}

}
