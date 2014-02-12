<?php

class DashboardController extends BaseController {

	/**
	 * Just shows dashboard modules
	 *
	 * @return Response
	 */
	public function index()
	{
        return 'This is dashboard';
        //return $this->render();
	}

}
