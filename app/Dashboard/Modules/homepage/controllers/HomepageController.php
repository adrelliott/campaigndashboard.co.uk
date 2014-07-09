<?php namespace Dashboard\Homepage;

use BaseController;

class HomepageController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->renderView();
    }


}
