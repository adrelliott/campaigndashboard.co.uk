<?php namespace Dashboard\Repositories;

use Input;
use Auth;
use Dashboard\Sales\Order as Model;

class EloquentOrderRepository extends EloquentRepository implements OrderRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    // public function updateRecord($id  = FALSE)
    // {
    //     $order = parent::updateRecord($id);
    //     $this->syncOrderItems($order);
    // }

    /**
     * Takes the input and formats the '_order_product' array to sync the order_product records
     */
    public function syncOrderItems($order)
    {
        $orderItems = array();
// dump(Input::all(), 1);
        # Fetch and arrange the orderItems (order_product records)
        if ( Input::has('_order_product') )
        {
            foreach ( Input::get('_order_product.product_id') as $k => $product )
            {
                # If we have passed quantity of 1 or more...
                if ( (int)Input::get('_order_product.quantity.' . $k) > 0 )
                {
                    $orderItems[$product]['quantity'] = (int)Input::get('_order_product.quantity.' . $k);
                    $orderItems[$product]['variant'] = Input::get('_order_product.variant.' . $k);

                     //Convert price to pennies
                    $orderItems[$product]['price'] = (int)Input::get('_order_product.price.' . $k) * 100; 
                    $orderItems[$product]['owner_id'] = Auth::user()->owner_id;  
                }
            }
        }

        # Sync (removing any records if we've set quantity to zero)
        return $order->products()->sync($orderItems);

    }

}