<?php

namespace Dashboard\Sales;

use Input, BaseModel, DB;

class OrderProduct extends BaseModel {

    // Determine the table as it has different name to this Model class
    protected $table = 'order_product';
    
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];

     // Wrap in a presenter (ShawnMcCool)
    public $presenter = 'Dashboard\Sales\OrderProductPresenter';

    // public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    
    // Validation rules
    // public static $rules = array(
    //     'contact_id' => 'required',
    // ); 

    public static function listsVariant($productId)
    {
        $query = DB::table('order_product')
            ->select('variant')
            ->distinct()
            ->where('product_id', $productId)
            ->whereNotNull('variant')
            ->orderBy('variant');

        with(new static)->scopeOnlyOwners($query);

        $results = $query->get();
        $list = [];

        foreach ($results as $row)
            $list[$row->variant] = $row->variant;

        return $list;
    }

    public function orders()
    {
        return $this->belongsTo('Dashboard\Sales\Order')->onlyOwners();
    }

    public function product()
    {
        return $this->belongsTo('Dashboard\Sales\Product')->onlyOwners();
    }

}
