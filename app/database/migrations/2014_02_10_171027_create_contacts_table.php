<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->datetime('deleted_at')->nullable();
			$table->integer('owner_id')->unsigned()->index();
			$table->string('title', 15)->nullable();
			$table->string('first_name', 255)->nullable();
			$table->string('last_name', 255)->nullable();
			$table->string('nickname', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('email2', 255)->nullable();
			$table->string('mobile_phone', 16)->nullable();
			$table->string('home_phone', 18)->nullable();
			$table->string('work_phone', 18)->nullable();
			$table->string('overseas_phone', 18)->nullable();
			$table->string('address1', 255)->nullable();
			$table->string('company', 150)->nullable();
			$table->string('address2', 255)->nullable();
			$table->string('address3', 255)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('postcode', 12)->nullable();
			$table->string('county', 50)->nullable();
			$table->string('country', 60)->nullable();
			$table->string('legacy_id', 25)->nullable();
			$table->string('record_type', 15)->nullable();
			$table->string('gender', 15)->nullable();
			$table->date('date_of_birth')->nullable();
			$table->string('twitter_id', 15)->nullable();
			$table->boolean('optin_email')->nullable();
			$table->boolean('optin_sms')->nullable();
			$table->boolean('optin_post')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
