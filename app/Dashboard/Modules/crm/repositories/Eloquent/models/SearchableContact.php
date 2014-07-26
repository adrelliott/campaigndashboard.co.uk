<?php namespace Dashboard\Crm;

use DB;

class SearchableContact extends Contact
{
    protected $table = 'contacts';
    protected $_productsJoined = FALSE;

    public static function search($conditions)
    {
        $instance = new static;

        $query = $instance->searchProducts($conditions['products']);
        $query = $query->searchProducts($conditions['not_products'], TRUE);

        $conditions = array_only($conditions, $instance->searchableValues());
        
        foreach ($conditions as $key => $val)
        {
            if ( $val )
            {
                if (method_exists($instance, 'scopeSearch' . studly_case($key)))
                    $query = call_user_func_array([ $query, 'search' . studly_case($key) ], [ $val ]);
                else
                    $query = $query->where($key, 'like', "%$val%");
            }
        }

        return $query
            ->groupBy('contacts.id')
            ->take(20)
            ->get();
    }

    public function scopeSearchName($query, $value)
    {
        $query->searchConcatenated($value, [ 'first_name', 'last_name', 'nickname' ]);
    }

    public function scopeSearchEmail($query, $value)
    {
        $query->searchConcatenated($value, [ 'email', 'email2' ]);
    }

    public function scopeSearchNumber($query, $value)
    {
        $query->searchConcatenated($value, [ 'mobile_phone', 'home_phone', 'work_phone', 'overseas_phone' ]);
    }

    public function scopeSearchAddress($query, $value)
    {
        $query->searchConcatenated($value, [ 'address1', 'address2', 'address3', 'city', 'county', 'country', 'postcode' ]);
    }

    public function scopeSearchConcatenated($query, $value, $fields)
    {
        $query->whereRaw('CONCAT(contacts.' . implode(', " ", contacts.', $fields) . ') LIKE "%?%"', array( $value ));
    }

    public function scopeSearchProducts($query, $products, $not = FALSE)
    {
        $where = [];

        if (!$this->_productsJoined)
        {
            $query->select('contacts.*')
                ->join('orders', 'contacts.id', '=', 'orders.id')
                ->join('order_product', 'orders.id', '=', 'order_product.order_id');

            $this->_productsJoined = TRUE;
        }

        foreach ($products as $searchVal)
        {
            if ($searchVal)
            {
                list($productId, $variant) = explode('::', $searchVal, 2);

                $query->where(function($q) use ($productId, $variant, $not)
                {
                    $q->where('product_id', ($not ? '!=' : '='), $productId);
                    
                    if ($variant)
                        $q->where('variant', ($not ? '!=' : '='), $variant);
                });
            }
        }
    }

    public function searchableValues()
    {
        return array( 'name', 'email', 'phone', 'address', 'company' );
    }
}