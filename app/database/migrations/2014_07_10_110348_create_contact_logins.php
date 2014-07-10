<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactLogins extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_logins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('contact_id')->index();
			$table->integer('owner_id');
			
			$table->string('email');
			$table->string('password');
			$table->string('hash')->index();
			$table->string('authenticate_salt');

			$table->datetime('deleted_at');
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
		Schema::drop('contact_logins');
	}

}
