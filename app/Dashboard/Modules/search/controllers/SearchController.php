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
            'tag_name_cont' => 'tag'
        ]);

        dd($search->results());

        // I think the best way to handle searching across multiple tables is just
        // to define a new view with the appropriate JOINs already – that way, we
        // can just operate on it as if it were its own table.
        //
        // Here's the syntax I'm using right now. I'll move it into a separate
        // migration or something when I've got the DB structure finalised.

        // CREATE OR REPLACE VIEW contact_with_tags AS
    
        //     SELECT contacts.*, tags.tag_title AS tag_name
        //     FROM contacts
        //     LEFT JOIN contact_tag ON contact_tag.contact_id = contacts.id
        //     LEFT JOIN tags ON tags.id = contact_tag.tag_id;
    }
}