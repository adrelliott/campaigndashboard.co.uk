<?php namespace Dashboard\Api;

use CrudController;

class ApiController extends CrudController {

    public function __construct($repo = NULL)
    {
        parent::__construct($repo);
        $this->asJson = TRUE;
    }

    public function index()
    {
        $this->model = $this->repo->all();
        return parent::index();
    }


      public function test($id = NULL)
    {
        $this->record = $this->getRelated(1, 'orderProducts', 'orderProducts.product')->toArray();
        dump(\DB::getQueryLog());
        return dump($this->record);
        
    }


}
