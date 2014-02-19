<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actions', function(Blueprint $table) {
			$table->increments('id');
			$table->datetime('deleted_at')->nullable();
			$table->integer('owner_id');
			$table->integer('contact_id');
			$table->integer('user_id')->nullable();
			$table->integer('order_id')->nullable();
			$table->integer('lead_id')->nullable();
			$table->string('action_name', 150)->nullable();
			$table->text('action_description')->nullable();
			$table->string('action_type', 100);
			$table->string('action_category', 100)->nullable();
			$table->string('action_status', 100)->nullable();
			$table->boolean('completed');
			$table->datetime('action_end_timestamp')->nullable();
			$table->datetime('action_start_timestamp')->nullable();
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
		Schema::drop('actions');
	}

}
