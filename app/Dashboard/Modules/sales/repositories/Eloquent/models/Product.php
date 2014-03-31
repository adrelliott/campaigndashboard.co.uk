<?php namespace Dashboard\Sales;

use BaseModel;

class Product extends BaseModel {
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Sales\ProductPresenter';

    // public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    
    // Validation rules
    public static $rules = array(
        'product_name' => 'required',
    ); 

      /**
     * Connect the Orders table with the Products table via pivot order_product
     * @return 
     */
    public function orders()
    {
        return $this->belongsToMany('Dashboard\Sales\Order');
    }

}
