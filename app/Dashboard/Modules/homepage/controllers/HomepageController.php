<?php namespace Dashboard\Homepage;

use BaseController, View;

class HomepageController extends BaseController {

    public function __construct()
    {
        parent::__construct();

        View::share('newDatatables', TRUE);
    }

    public function index()
    {
        return $this->renderView();
    }


}
