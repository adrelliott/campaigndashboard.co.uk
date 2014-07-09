<?php

use Dashboard\Sales\Order;

class OrdersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('orders')->truncate();
        Order::create(
            array(
                'contact_id' => 1,
                'order_title' => "Order 1",
                'payment_method' => 'Cash',
                'order_source' => 'phone',
                'order_reference' => 'order ref for #1',
                'order_notes' => 'These are order notes...',
                'order_total' => 10.11
            )
        );
        Order::create(
            array(
                'contact_id' => 1,
                'order_title' => "Order 2",
                'payment_method' => 'Credit Card',
                'order_source' => 'phone',
                'order_reference' => 'order ref for #2, contact 2',
                'order_notes' => 'These are order notes...',
                'order_total' => 10.11
            )
        );
        Order::create(
            array(
                'contact_id' => 2,
                'order_title' => "Order 3",
                'payment_method' => 'Cash',
                'order_source' => 'shop',
                'order_reference' => 'order ref for #2 contact 2',
                'order_notes' => 'These are order notes...',
                'order_total' => 10.11
            )
        );
	}

}
