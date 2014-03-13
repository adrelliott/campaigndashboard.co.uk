<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$this->call('ContactTableSeeder');
        $this->call('UserTableSeeder');
        $this->command->info('Contact table seeded!');
		$this->command->info('User table seeded!');
		$this->call('ProductTableSeeder');
	}
}