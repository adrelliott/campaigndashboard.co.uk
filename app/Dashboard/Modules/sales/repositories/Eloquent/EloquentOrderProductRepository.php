<?php namespace Dashboard\Repositories;

use Input, Auth;
use Dashboard\Sales\OrderProduct as Model;

class EloquentOrderProductRepository extends EloquentRepository implements OrderProductRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getFor($dataTable = TRUE)
    {
        $this->setCols();
        if ( $contact_id = Input::get('contact_id') ) $this->q->where('contact_id', $contact_id);
        if ( $sortASC = Input::get('sortASC') ) $this->q->orderBy($sortASC, 'asc');
        if ( $sortDESC = Input::get('sortDESC') ) $this->q->orderBy($sortDESC, 'desc');
        $this->q->with('products');
        return $this->getResult($dataTable);
    }

    // public function formatOrderProductArray($order_id)
    // {
    //     // Abort if no orderProduct array in Input
    //     if ( ! Input::has('_order_product') ) return;

    //     // Set up the Arrays
    //     $data = array();
    //     $input = Input::get('_order_product');
    //     $standard = array(
    //         'owner_id' => Auth::user()->owner_id,
    //         'contact_id' => Input::get('contact_id'),
    //         'order_id' => $order_id
    //     );

    //     // Loop through Input array and set up pivot table sync() array
    //     foreach ( $input['product_id'] as $k => $id )
    //     {
    //         foreach ( $input as $col => $a)
    //         {
    //             $data[$id][$col] = $input[$col][$k];
    //         }
    //         $data[$id] = array_merge($data[$id], $standard);

    //         // Remove the product_id key
    //         unset($data[$id]['product_id']);
    //     }  

    //     return $data;
    // }    


}