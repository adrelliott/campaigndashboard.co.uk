<?php namespace Dashboard\Search;

use BaseController, View;

class SearchController extends BaseController
{
    public function index()
    {
        $columns = [ 'full_name', 'email', 'phone', 'tags' ];
        $predicates = [ 'cont' => 'contain', 'start' => 'start with', 'end' => 'end with' ];

        return $this->renderView()
            ->withColumns($columns)
            ->withPredicates($predicates);
    }

    public function search()
    {
        $search = Contact::search([
            'full_name_cont' => 'Jamie',
            'email_start' => 'jamie',
            'tag_name_cont' => 'membership'
        ]);

        // I think the best way to handle searching across multiple tables is just
        // to define a new view with the appropriate JOINs already – that way, we
        // can just operate on it as if it were its own table.
        //
        // Here's the syntax I'm using right now. I'll move it into a separate
        // migration or something when I've got the DB structure finalised.

        // CREATE OR REPLACE VIEW contacts_with_tags AS
    
        //     SELECT contacts.*, tags.tag_title AS tag_name
        //     FROM contacts
        //     LEFT JOIN contact_tag ON contact_tag.contact_id = contacts.id
        //     LEFT JOIN tags ON tags.id = contact_tag.tag_id;
    }
}