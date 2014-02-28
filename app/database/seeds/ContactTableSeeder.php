<?php

use Dashboard\Crm\Contact;

class ContactTableSeeder extends Seeder {

	public function run()
	{
		DB::table('contacts')->delete();

		// test
		Contact::create(
            array(
				'first_name' => "firstname",
				'last_name' => "lastanem",
				'email' => 'email1@email.com',
				'email2' => 'email2@email.com',
				'mobile_phone' => "01666535353",
				'home_phone' => '01614567777',
				'work_phone' => '065635353531',
				'address1' => 'addres 1',
				'address2' => 'address 22',
                'owner_id' => 10222
			)
        );
        Contact::create(
            array(
                'first_name' => "chris",
                'last_name' => "jenkins",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10222
            )
        );
        Contact::create(
            array(
                'first_name' => "al",
                'last_name' => "elliott",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10222
            )
        );
        Contact::create(
            array(
                'first_name' => "Leanne",
                'last_name' => "lastElliottanem",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10222
            )
        );
        Contact::create(
            array(
                'first_name' => "Charlie",
                'last_name' => "Dawg",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10222
            )
        );
        Contact::create(
            array(
                'first_name' => "firstname",
                'last_name' => "lastanem",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10000
            )
        );
        Contact::create(
            array(
                'first_name' => "chris",
                'last_name' => "jenkins",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10000
            )
        );
        Contact::create(
            array(
                'first_name' => "al",
                'last_name' => "elliott",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10000
            )
        );
        Contact::create(
            array(
                'first_name' => "Leanne",
                'last_name' => "lastElliottanem",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10000
            )
        );
        Contact::create(
            array(
                'first_name' => "Charlie",
                'last_name' => "Dawg",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10000
            )
        );
        Contact::create(
            array(
                'first_name' => "firstname",
                'last_name' => "lastanem",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10233
            )
        );
        Contact::create(
            array(
                'first_name' => "chris",
                'last_name' => "jenkins",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10233
            )
        );
        Contact::create(
            array(
                'first_name' => "al",
                'last_name' => "elliott",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10233
            )
        );
        Contact::create(
            array(
                'first_name' => "Leanne",
                'last_name' => "lastElliottanem",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10233
            )
        );
        Contact::create(
            array(
                'first_name' => "Charlie",
                'last_name' => "Dawg",
                'email' => 'email1@email.com',
                'email2' => 'email2@email.com',
                'mobile_phone' => "01666535353",
                'home_phone' => '01614567777',
                'work_phone' => '065635353531',
                'address1' => 'addres 1',
                'address2' => 'address 22',
                'owner_id' => 10233
            )
        );
	}
}