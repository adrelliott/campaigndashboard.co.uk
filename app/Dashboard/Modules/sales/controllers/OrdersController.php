<?php namespace Dashboard\Sales;

use BaseController;
use Dashboard\Repositories\OrderRepositoryInterface as ModelInterface;

class OrdersController extends BaseController {


    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    } 

}