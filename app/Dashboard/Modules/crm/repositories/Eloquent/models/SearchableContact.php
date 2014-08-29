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

    public function scopeSearchColumns($query, $term, array $columns)
    {
        $self = $this;
        $conditions = array_keys(array_only(array_flip($columns), $self->searchableValues()));

        // If we include both the first name and the last name, remove the two
        // names individually and run the search on the name scope
        if (in_array('first_name', $conditions) && in_array('last_name', $conditions))
        {
            unset($conditions[array_search('first_name', $conditions)]);
            unset($conditions[array_search('last_name', $conditions)]);

            $conditions[] = 'name';
        }
        
        $query->where(function( $q ) use ( $term, $conditions, $self )
        {
            foreach ($conditions as $col)
            {
                if (method_exists($self, 'scopeSearch' . studly_case($col)))
                    call_user_func_array([ $q, 'search' . studly_case($col) ], [ $term, TRUE ]);
                else
                    $q->orWhere($col, 'like', "%$term%");
            }
        });
    }

    public function scopeSearchName($query, $value, $or = FALSE)
    {
        $query->searchConcatenated($value, [ 'first_name', 'last_name' ], $or);
    }

    public function scopeSearchEmail($query, $value, $or = FALSE)
    {
        $query->searchConcatenated($value, [ 'email', 'email2' ], $or);
    }

    public function scopeSearchPhone($query, $value, $or = FALSE)
    {
        $query->searchConcatenated($value, [ 'mobile_phone', 'home_phone', 'work_phone', 'overseas_phone' ], $or);
    }

    public function scopeSearchAddress($query, $value, $or = FALSE)
    {
        $query->searchConcatenated($value, [ 'address1', 'address2', 'address3', 'city', 'county', 'country', 'postcode' ], $or);
    }

    public function scopeSearchConcatenated($query, $value, $fields, $or = FALSE)
    {
        $method = $or ? 'orWhere' : 'where';
        $query->$method(DB::raw('CONCAT_WS(" ", contacts.' . implode(', contacts.', $fields) . ')'), 'like', "%$value%");
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
        return array( 'id', 'landline', 'first_name', 'last_name', 'name', 'email', 'phone', 'mobile_phone', 'work_phone', 'home_phone', 'address', 'company' );
    }
}