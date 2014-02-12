<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('email')->nullable();
			$table->string('email2')->nullable();
			$table->string('mobile_phone', 16)->nullable();
			$table->string('home_phone', 18)->nullable();
			$table->string('work_phone', 18)->nullable();
			$table->string('Address_1')->nullable();
			$table->string('Address_2')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}