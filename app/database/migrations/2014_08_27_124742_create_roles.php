<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::create('roles', function(Blueprint $table)
//		{
//			$table->increments('id');
//			$table->integer('owner_id')->index();
//			$table->string('role')->index();
//
//			$table->timestamps();
//		});

		Schema::create('contact_role', function(Blueprint $table)
		{
			$table->integer('contact_id')->index();
			$table->integer('role_id')->index();
			
			$table->text('notes');
			$table->string('season');

			$table->datetime('start');
			$table->datetime('end');

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
//		Schema::drop('roles');
		Schema::drop('contact_role');
	}

}
