<?php namespace Dashboard\Sales;

use BaseModel;

class Order extends BaseModel {
    
    // Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

    // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Sales\OrderPresenter';
    
    // Validation rules
    public static $rules = array(
        'save' => array(
            // 'first_name'                  => 'between:2,32',
            // 'last_name'                  => 'required|between:2,32',
            // 'email'                 => 'email',
        ),
        'create' => array(),
        'update' => array()
    );

    public function orderProducts()
    {
        return $this->hasMany('Dashboard\Sales\OrderProduct');
    }

    /**
     * Connect the Orders table with the Products table via pivot order_product
     * @return 
     */
    public function products()
    {
        return $this->belongsToMany('Dashboard\Sales\Product');
    }


    
    // public function contact()
    // {
    //     return $this->belongsTo('Dashboard\Crm\Contact');
    // }

     
}
