<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_role', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->integer('owner_id')->unsigned();
			$table->integer('user_id')->unsigned()->nullable();
			$table->datetime('role_start_timestamp')->nullable();
			$table->datetime('role_end_timestamp')->nullable();
			$table->text('role_note')->nullable();
			$table->string('role_variant')->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_role');
	}

}
