<?php namespace Dashboard\Search;

use BaseController, View, Input, Request;
use Dashboard\Crm\SearchableContact;

class SearchController extends BaseController
{
    public function index()
    {
        $columns = [ 'full_name' => 'Full name', 'email' => 'Email', 'phone' => 'Phone Number', 'tag_name' => 'Tags', 'product_id' => 'Product IDs' ];
        $predicates = [ 'cont' => 'contains', 'notcont' => 'doesn\'t contain', 'start' => 'starts with', 'end' => 'ends with' ];
        
        return $this->renderView()
            ->withColumns($columns)
            ->withPredicates($predicates);
    }

    public function search()
    {
        $search = SearchableContact::search(Input::except([ '_token', 'combination' ]))
            ->search(Input::only([ 'combination' ]))
            ->results()
            ->toArray();

        return $this->renderView()
            ->withResults($search);
    }
}