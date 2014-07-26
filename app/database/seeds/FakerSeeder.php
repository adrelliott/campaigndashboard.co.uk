<?php

use \Dashboard\Tags\Tag;
use \Dashboard\Tags\TagVariant;
use \Dashboard\Tags\ContactTag;
use \Dashboard\Sales\Order;
use \Dashboard\Sales\Product;
use \Dashboard\Crm\Contact;

class FakerSeeder extends Seeder {

	public function run()
	{
        if (! $pAdult = Product::where([ 'product_title' => 'Season Ticket (Adult)', 'owner_id' => '10000' ])->first() )
        {
            $pAdult = new Product([ 'product_title' => 'Season Ticket (Adult)', 'product_price' => '600.00' ]);
            $pAdult->owner_id = '10000';
            $pAdult->save();
        }

        if (! $pConcessions = Product::where([ 'product_title' => 'Season Ticket (Concessions)', 'owner_id' => '10000' ])->first() )
        {
            $pConcessions = new Product([ 'product_title' => 'Season Ticket (Concessions)', 'product_price' => '200.00' ]);
            $pConcessions->owner_id = '10000';
            $pConcessions->save();
        }


        $generator = \Faker\Factory::create();
        
        for ($i=0; $i < 50000; $i++)
        {
            $contact = new Contact([
                'first_name' => $generator->firstName,
                'last_name' => $generator->lastName,
                'email' => $generator->email,
                'work_phone' => $generator->phoneNumber,
                'address1' => $generator->streetAddress,
                'city' => $generator->city,
                'postcode' => $generator->postcode,
                'country' => $generator->country,
                'company' => $generator->company
            ]);
            $contact->owner_id = '10000';
            $contact->save();

            // 2/3 of the contacts will have orders
            for ($i=0; $i < 3; $i++)
            {
                if (round(rand(0,2)) % 2 !== 0)
                {
                    $tempAdult = clone $pAdult;
                    $tempConc = clone $pConcessions;

                    $order = new Order;
                    $order->owner_id = '10000';
                    $order->contact_id = $contact->id;
                    $order->order_date = $generator->dateTimeBetween('-2 years', 'now');

                    $contact->orders()->save($order);

                    // 2/3 of those will be adult season ticket holders
                    if (round(rand(0,2)) % 2 == 0)
                    {
                        $order->products()->save($tempAdult, [
                            'quantity' => (round(rand(0, 5)) == 5) ? 2 : 1,
                            'owner_id' => '10000' ]);
                    }

                    // 1/3 will be concessions season ticket holders
                    if (round(rand(0,9)) % 3 == 0)
                    {
                        $order->products()->save($tempConc, [
                            'quantity' => (round(rand(0, 6)) % 3 == 0) ? 2 : 1,
                            'owner_id' => '10000' ]);
                    }
                }
            }
        }
	}

}
