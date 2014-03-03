<?php

use Dashboard\Admin\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->delete();
        Eloquent::unguard();

        // IMPORTANT !!!!!!!!!!!!!!!!!!!!!!! Don;t forget to comment out the validation rules to seed!

		User::create(
            array(
                'first_name' => "Al",
                'last_name' => "Elliott",
                'email' => 'al@dallasmatthews.co.uk',
                'company' => 'Dallas Matthews',
                'admin_level' => 0,
                'password' => Hash::make('DMmanch130'),
                'active' => 1,
                'owner_id' => '10000',
                'mobile_phone' => '065635353531',
                'home_phone' => '065635353531',
                'work_phone' => '065635353531'
            )
        );
        User::create(
            array(
                'first_name' => "Isla",
                'last_name' => "Wilson",
                'email' => 'isla@rubystarassociates.co.uk',
                'company' => 'RubyStar',
                'admin_level' => 3,
                'password' => Hash::make('DMmanch233'),
                'active' => 1,
                'owner_id' => '10233',
                'mobile_phone' => '065635353531',
                'home_phone' => '065635353531',
                'work_phone' => '065635353531'
            )
        );
        User::create(
            array(
                'first_name' => "Paul",
                'last_name' => "Howarth",
                'email' => 'paulhaworth@fc-utd.co.uk',
                'company' => 'FC United',
                'admin_level' => 3,
                'password' => Hash::make('DMmanch222'),
                'active' => 1,
                'owner_id' => '10222',
                'mobile_phone' => '065635353531',
                'home_phone' => '065635353531',
                'work_phone' => '065635353531'
            )
        );
	}

}
