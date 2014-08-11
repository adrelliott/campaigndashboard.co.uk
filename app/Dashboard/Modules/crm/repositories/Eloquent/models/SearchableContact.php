<?php namespace Dashboard\Crm;

use DB;

class SearchableContact extends Contact
{
    protected $table = 'contacts';
    protected $_productsJoined = FALSE;
    protected $_tagsJoined = FALSE;

    public static function search($conditions, $options)
    {
        $instance = new static;

        $query = $instance->onlyOwners($instance->getTable());
        $query->searchProducts($conditions['products']);
        $query->searchProducts($conditions['not_products'], TRUE);
        $query->searchTags($conditions['tags']);
        $query->searchTags($conditions['not_tags'], TRUE);

        $conditions = array_only($conditions, $instance->searchableValues());
        
        foreach ($conditions as $key => $val)
        {
            if ( $val )
            {
                if (method_exists($instance, 'scopeSearch' . studly_case($key)))
                    call_user_func_array([ $query, 'search' . studly_case($key) ], [ $val ]);
                else
                    $query->where($key, 'like', "%$val%");
            }
        }

        $search = clone $query;

        $results = $search
            ->take($options['limit'])->skip($options['skip'])
            ->orderBy($options['order'], $options['dir'])
            ->groupBy('contacts.id')
            ->get();

        return array( $results, $query->count() );
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
        $query->where(DB::raw('CONCAT_WS(contacts.' . implode(', " ", contacts.', $fields) . ')'), 'like', "%$value%");
    }

    public function scopeSearchProducts($query, $products, $not = FALSE)
    {
        if ( ! (count($products) == 1 && empty($products[0])) )
        {
            $where = [];

            if (!$this->_productsJoined)
            {
                $query->select('contacts.*')
                    ->join('orders', 'contacts.id', '=', 'orders.contact_id')
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
    }

    public function scopeSearchTags($query, $tags, $not = FALSE)
    {
        if ($tags)
        {
            $where = [];
            $tags = explode(',', $tags);

            if (!$this->_tagsJoined)
            {
                $query->select('contacts.*')
                    ->join('contact_tag', 'contacts.id', '=', 'contact_tag.contact_id');

                $this->_tagsJoined = TRUE;
            }

            if (!$not)
                $query->whereIn('contact_tag.tag_id', $tags);
            else
                $query->whereNotIn('contacts.id', function($q) use ($tags)
                {
                    $q->select('contacts.id')
                      ->from('contacts')
                      ->join('contact_tag', 'contacts.id', '=', 'contact_tag.contact_id')
                      ->whereIn('tag_id', $tags);
                });
        }
    }

    public function searchableValues()
    {
        return array( 'name', 'email', 'phone', 'address', 'company' );
    }
}