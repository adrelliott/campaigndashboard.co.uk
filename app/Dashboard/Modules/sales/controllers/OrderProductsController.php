<?php namespace Dashboard\Sales;

use BaseController;
use Dashboard\Repositories\OrderProductRepositoryInterface as ModelInterface;

class OrderProductsController extends BaseController {

    protected $modulename = 'sales';
    protected $foldername = 'orderproducts';


    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    } 

}