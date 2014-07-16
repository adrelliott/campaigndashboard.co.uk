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
//     SELECT `contacts`.*, `tags`.`tag_title` AS `tag_name`, concat(`contacts`.`first_name`,' ',`contacts`.`last_name`) AS `full_name`, `order_product`.`product_id` AS `product_id`
    
//     FROM `contacts`
    
//     -- Tags
//     LEFT JOIN `contact_tag` ON `contact_tag`.`contact_id` = `contacts`.`id`
//     LEFT JOIN `tags` on `tags`.`id` = `contact_tag`.`tag_id`
    
//     -- Orders
//     LEFT JOIN `orders` on `orders`.`contact_id` = `contacts`.`id`
//     LEFT JOIN `order_product` on `order_product`.`order_id` = `orders`.`id`
//
class SearchableContact extends Contact implements Frisk\Searchable
{
    use Frisk\Model;

    public function searchableColumns()
    {
        return '*';
    }
}