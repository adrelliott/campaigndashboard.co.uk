<?php namespace Dashboard\Sales;

use CrudController;
use Dashboard\Repositories\OrderRepositoryInterface as ModelInterface;
use Dashboard\Repositories\ProductRepositoryInterface as ProductInterface;
use Dashboard\Repositories\OrderProductRepositoryInterface as OrderProductInterface;

class OrdersController extends CrudController {



    public function __construct(ModelInterface $repo, ProductInterface $products, OrderProductInterface $orderProducts)
    {
        parent::__construct($repo);
        $this->productRepo = $products;
        $this->orderProductRepo = $orderProducts;

        // What local methods do we want to fire after each event?
        $this->postEvent = [
            'create' => 'createOrderform',
            'store' => 'saveOrderProducts',
            'edit' => 'loadOrderForm',

        ];
    }

    public function createOrderform()
    {
        $this->getProducts();
    }

    public function saveOrderProducts()
    {
        $this->syncOrderItems();
    }

    public function loadOrderForm()
    {
        $this->getProducts();
        $this->getOrderProducts();
    }





    public function getProducts()
    {
        $this->model->products =  $this->productRepo->getProducts();
    }

    public function getOrderProducts()
    {
        $this->model->orderProducts =  $this->orderProductRepo->getOrderProducts($this->model->id);
    }

    public function syncOrderItems()
    {
        // dd('syncOrderItems called');
        $this->repo->syncOrderItems($this->model);
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

   



}