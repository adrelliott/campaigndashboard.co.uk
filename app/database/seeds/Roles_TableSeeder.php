<?php

class Roles_TableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('roles_seeder')->truncate();

		$roles_seeder = array(
            array(
                'role_name' => 'Role 1',
                'role_description' => 'Description 1',
                'owner_id' => 10222,
                ),
            array(
                'role_name' => 'Role 2',
                'role_description' => 'Description 2',
                'owner_id' => 10222,
                ),
            array(
                'role_name' => 'Role 3',
                'role_description' => 'Description 3',
                'owner_id' => 10222,
                ),
            array(
                'role_name' => 'Role 4 - not 102222',
                'role_description' => 'Description 4',
                'owner_id' => 10000,
                ),
		);

		// Uncomment the below to run the seeder
		DB::table('roles')->insert($roles_seeder);
	}

}
