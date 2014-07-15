<?php namespace Dashboard\Search;

use BaseController, View;
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
        $search = ContactWithTags::search([
            'full_name_cont' => 'Jamie',
            'tag_name_start' => 'tag'
        ]);

        dd($search->results());
    }
}