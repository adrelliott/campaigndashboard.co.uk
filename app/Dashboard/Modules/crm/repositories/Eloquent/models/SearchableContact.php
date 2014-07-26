<?php namespace Dashboard\Crm;

use Frisk;

// I think the best way to handle searching across multiple tables is just
// to define a new view with the appropriate JOINs already – that way, we
// can just operate on it as if it were its own table. So, this model (SearchableContact)
// exists to allow us to search on a contact and ultimately have an instance of
// Contact to work with, while searching the view.
//
// Here's the syntax I'm using right now. I'll move it into a separate
// migration or something when I've got the DB structure finalised.
// 
// CREATE OR REPLACE VIEW `searchable_contacts` AS
//     SELECT `contacts`.*, `tags`.`tag_title` AS `tag_name`, CONCAT(`tags`.`tag_title`, ' ', `tag_variants`.`variant_name`, ':', `tag_variants`.`variant_value`) AS `tag_with_variants`, concat(`contacts`.`first_name`,' ',`contacts`.`last_name`) AS `full_name`
    
//     FROM `contacts`
    
//     -- Tags
//     LEFT JOIN `contact_tag` ON `contact_tag`.`contact_id` = `contacts`.`id`
//     LEFT JOIN `tags` on `tags`.`id` = `contact_tag`.`tag_id`
//     LEFT JOIN `tag_variants` on `tag_variants`.`tag_id` = `tags`.`id`
//
class SearchableContact extends Contact implements Frisk\Searchable
{
    use Frisk\Model;

    public function searchableColumns()
    {
        return '*';
    }
}