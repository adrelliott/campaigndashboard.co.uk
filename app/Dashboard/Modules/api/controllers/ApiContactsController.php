<?php namespace Dashboard\Api;

use CrudController;
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;


class ApiContactsController extends CrudController {

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
        $this->asJson = TRUE;
    }

    public function index()
    {
        $this->model = $this->repo->all();
        return parent::index();
    }

     public function getOrderProducts($id)
    {
        return $this->getRelated($id, 'orderProducts', 'orderProducts.product');
    }


}



