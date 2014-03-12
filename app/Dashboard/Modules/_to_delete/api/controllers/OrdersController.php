<?php namespace Dashboard\Api;

use BaseController, Input;
use Dashboard\Api\ApiController;
use Dashboard\Api\Repositories\OrderApiRepositoryInterface as OrderInterface;
use Dashboard\Repositories\OrderProductRepositoryInterface as OrderProductInterface;

class OrdersController extends ApiController {

    protected $orderProduct;
    protected $tags;

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(OrderInterface $model, OrderProductInterface $orderProduct)
    {
        parent::__construct($model);
        $this->orderProduct = $orderProduct;
    }

    public function store()
    {
        // Create the Order row
        $this->result = $this->repo->createRecord();

        // Now create an array for the pivot table
        $sync = $this->orderProduct->formatOrderProductArray($this->result->id);

        // Now add these products to the pivot table order_product
        $this->result->products()->sync($sync);

        if ($this->result->id) $this->result->responseCode = 200;
        return $this->returnJson();
    }

    public function update($id)
    {
        // Update the Order row
        $this->result = $this->repo->updateRecord($id);

        // Now create an array for the pivot table
        $sync = $this->orderProduct->formatOrderProductArray($id);

        // Now add these products to the pivot table order_product
        $this->result->products()->sync($sync);

        // if ($this->result->id) $this->result->responseCode = 200;
        // return $this->returnJson();
    }


}