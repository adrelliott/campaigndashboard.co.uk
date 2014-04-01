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

    protected $beforeRender = array(
        'create' => 'setUpOrderform',
        'edit' => 'setUpOrderform',
        'store' => 'createOrder',
    );
    

    public function __construct(ModelInterface $repo, ProductInterface $products)
    {
        $this->productRepo = $products;
        parent::__construct($repo);
    }


    public function setUpOrderform( $id = FALSE )
    {
        # Set up product list
        $this->record->productList = $this->productRepo->lists('product_title');

        # 
    }

    public function createOrder()
    {
        # Get order items
        # Organise into array for pivot table
        # Remove any lines with quantity = 0
        # Sync pivot table
        # 
    }



}