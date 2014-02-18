<?php

namespace Dashboard\App\Dashboard;
use Auth, Input, Redirect, View;

class DashboardController extends \BaseController {

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
