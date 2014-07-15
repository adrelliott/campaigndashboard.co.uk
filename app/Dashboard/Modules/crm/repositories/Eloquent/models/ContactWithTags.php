<?php namespace Dashboard\Crm;

use Frisk;

// I think the best way to handle searching across multiple tables is just
// to define a new view with the appropriate JOINs already – that way, we
// can just operate on it as if it were its own table. So, this model (ContactWithTags)
// exists to allow us to search on a contact and ultimately have an instance of
// Contact to work with, while searching the view.
//
// Here's the syntax I'm using right now. I'll move it into a separate
// migration or something when I've got the DB structure finalised.
//
// CREATE OR REPLACE VIEW `contact_with_tags` AS
//     SELECT `contacts`.*, `tags`.`tag_title` AS `tag_name`, CONCAT(`contacts`.`first_name`,' ',`contacts`.`last_name`) AS `full_name`
//     FROM `contacts`
//     LEFT JOIN `contact_tag` ON `contact_tag`.`contact_id` = `contacts`.`id`
//     LEFT JOIN `tags` on `tags`.`id` = `contact_tag`.`tag_id`
//
class ContactWithTags extends Contact implements Frisk\Searchable
{
    use Frisk\Model;

    public function searchableColumns()
    {
        return '*';
    }
}