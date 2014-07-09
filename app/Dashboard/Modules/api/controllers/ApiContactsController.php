<?php namespace Dashboard\Api;

use Dashboard\Api\ApiController;
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;


class ApiContactsController extends ApiController {

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

    

    public function getOrderProducts($id)
    {
        return $this->getRelated($id, 'orderProducts', 'orderProducts.product');
    }

}