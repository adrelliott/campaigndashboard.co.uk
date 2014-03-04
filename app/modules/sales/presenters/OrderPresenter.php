<?php namespace Dashboard\Sales;
use McCool\LaravelAutoPresenter\BasePresenter;

//Pull in the models required for this record
use Dashboard\Sales\Order as Model;
use Dashboard\Sales\OrderProduct as OrderProduct;
use Dashboard\Crm\Note as Note;
use Dashboard\Crm\Action as Action;
use Dashboard\Crm\Contact as Contact;
use Dashboard\Crm\Tag as Tag;

use \Carbon;

class OrderPresenter extends BasePresenter {

    /** 
     * Columns to return from queries
     * @var array
     */
    protected $cols = array(
        'orderItems' => array(
            'product_id',
            'variant',
            'quantity',
            'price',
        ),
    );


     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

    
    public function created_at()
    {
        return $this->resource->created_at->toDayDateTimeString();
    }

    public function orderItems()
    {
        return $this->resource->products()->get($this->cols['orderItems'])->toArray();
    }

    public function orderItemsBlankRow()
    {
        $retval = $this->orderItems;

        // set up blank 
        $retval[] = array_fill_keys($this->cols['orderItems'], '');

        return $retval;
    }

    
}