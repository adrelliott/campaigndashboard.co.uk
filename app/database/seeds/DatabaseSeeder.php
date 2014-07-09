<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$this->call('ContactTableSeeder');
        $this->command->info('Contact table seeded!');
        
        $this->call('UserTableSeeder');
		$this->command->info('User table seeded!');
        
        $this->call('ProductTableSeeder');
        $this->command->info('Product table seeded!');
		
        $this->call('TagTableSeeder');
        $this->command->info('Tag table seeded!');

        $this->call('OrdersTableSeeder');
        $this->command->info('Orders table seeded!');        

		$this->call('Order_productTableSeeder');
        $this->command->info('order_product table seeded!');
	}
}