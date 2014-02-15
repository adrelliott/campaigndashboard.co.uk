<?php

namespace Dashboard\App\Dashboard;
use Auth, Input, Redirect, View;

class DashboardController extends \BaseController {

	/**
	 * Just shows dashboard modules
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('dashboard::index1');
	}

}
