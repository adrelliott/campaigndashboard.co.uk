<?php namespace Dashboard\Crm;

use Frisk;

class ContactWithTags extends Contact implements Frisk\Searchable
{
    use Frisk\Model;

    public function searchableColumns()
    {
        return '*';
    }
}