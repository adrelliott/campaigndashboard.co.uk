<?php namespace Dashboard\Sales;

use BaseController;
use Event;
use View;
use Dashboard\Repositories\OrderRepositoryInterface as ModelInterface;
use Dashboard\Repositories\ProductRepositoryInterface as ProductInterface;

class OrdersController extends BaseController {

    protected $productRepo;

    /**
     * When show() or edit() are called, use this to eager load other joined records
     * @var as a CSV: relationship1, relationship 2
     */
    protected $with ='products';
    

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    } 



}