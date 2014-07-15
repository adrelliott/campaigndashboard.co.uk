<?php namespace Dashboard\Search;

use BaseController, View, Input;
use Dashboard\Crm\ContactWithTags;

class SearchController extends BaseController
{
    public function index()
    {
        $columns = [ 'full_name' => 'full_name', 'email' => 'email', 'phone' => 'phone', 'tags' => 'tags' ];
        $predicates = [ 'cont' => 'contains', 'start' => 'starts with', 'end' => 'ends with' ];
        
        return $this->renderView()
            ->withColumns($columns)
            ->withPredicates($predicates);
    }

    public function search()
    {
        $search = ContactWithTags::search(Input::except([ '_token', 'combination' ]))
            ->results();

        dd($search);

        return $this->renderView()
            ->withResults($search);
    }
}