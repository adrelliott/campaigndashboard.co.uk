<?php namespace Dashboard\Sales;

use BaseController;
use Dashboard\Repositories\OrderRepositoryInterface as ModelInterface;

class OrdersController extends BaseController {

    protected $modulename = 'sales';
    protected $foldername = 'orders';


    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    } 

}