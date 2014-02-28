<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->datetime('deleted_at')->nullable();
			$table->integer('owner_id');
			$table->string('first_name', 100)->nullable();
			$table->string('last_name', 100)->nullable();
			$table->string('company', 100)->nullable();
			$table->string('email', 100);
            $table->string('mobile_phone', 16)->nullable();
            $table->string('home_phone', 18)->nullable();
            $table->string('work_phone', 18)->nullable();
			$table->string('password', 255);
			$table->boolean('active')->default(1);
            $table->boolean('admin_level')->default(3);
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
		Schema::drop('users');
	}

}
