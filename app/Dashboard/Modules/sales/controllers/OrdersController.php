<?php namespace Dashboard\Sales;

use BaseController;
use Dashboard\Repositories\OrderRepositoryInterface as ModelInterface;
use Dashboard\Repositories\ProductRepositoryInterface as ProductInterface;

class OrdersController extends BaseController {

    protected $productRepo;

    /**
     * When show() or edit() are called, use this to eager load other joined records
     * @var as a CSV: relationship1, relationship 2
     */
    protected $with ='products';

    /**
     * define methods to be run before we send view the hooks
     * @var array
     */
    protected $postEvent = array(
        'create' => 'setUpOrderform',
        'show' => 'setUpOrderform',
        'edit' => 'setUpOrderform',
        'update' => 'syncOrderItems',
        'store' => 'syncOrderItems',
    );
    

    public function __construct(ModelInterface $repo, ProductInterface $products)
    {
        $this->productRepo = $products;
        parent::__construct($repo);
    }


//     public function store()
//     {
//         # Create the order record
//         $this->record = $this->repo->createRecord();

//         # Add/remove any orderItems
//         $this->repo->syncOrderItems($this->record);
// dd(\Input::all());
//         return $this->redirect();
//     }

//     // public function update($id)
    // {
    //     //Try to update and pass result to redirect() method
    //     $this->record = $this->repo->updateRecord($id);

    //     # Add/remove any orderItems
    //     $this->repo->syncOrderItems($this->record);

    //     return $this->redirect();
    // }


    /**
     * Updates order items on an order)
     */
    public function syncOrderItems()
    {
        // dd('syncOrderItems called');
        $this->repo->syncOrderItems($this->record);
    }
   
    /**
     * Sets up the order form ready for the order to be created
     * @param boolean $id [description]
     */
    public function setUpOrderform( $id = FALSE )
    {
        # Set up product list
        $this->record->productList = $this->productRepo->dropdown('product_title');

        # Perhpas we should also get the prices of the products? 
    }




}