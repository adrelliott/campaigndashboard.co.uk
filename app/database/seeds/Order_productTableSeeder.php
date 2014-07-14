<?php

// Use Dashboard\Sales\OrderProduct;

class Order_productTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('order_product')->truncate();

        DB::table('order_product')->insert(
            array(
                'order_id' => 1,
                'product_id' => 4,
                'variant' => 'Variant A',
                'quantity' => 1,
                'tax' => 12,
                'price' => 440,
                'owner_id' => 10222
            )
        );

    
        DB::table('order_product')->insert(
            array(
                'order_id' => 2,
                'product_id' => 4,
                'variant' => 'Variant B',
                'quantity' => 2,
                'tax' => 122,
                'price' => 442,
                'owner_id' => 10222
            )
        );

    
		DB::table('order_product')->insert(
            array(
                'order_id' => 1,
                'product_id' => 5,
                'variant' => 'Variant A',
                'quantity' => 3,
                'tax' => 22,
                'price' => 330,
                'owner_id' => 10222
            )
        );

		// Uncomment the below to run the seeder
		
	}

}
