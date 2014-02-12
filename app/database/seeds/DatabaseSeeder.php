<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$this->call('ContactTableSeeder');
		$this->command->info('Contact table seeded!');
	}
}