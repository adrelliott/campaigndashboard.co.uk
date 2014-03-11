<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBroadcastsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('broadcasts', function(Blueprint $table) {
			$table->increments('id');
			$table->datetime('deleted_at')->nullable();
			$table->datetime('sent_at')->nullable();
			$table->integer('owner_id');
			$table->integer('user_id')->nullable();
            $table->integer('search_id')->nullable();
			$table->string('broadcast_name', 150)->nullable();
            $table->string('broadcast_type', 100)->default('email');
            $table->string('broadcast_description', 300)->nullable();
            $table->string('broadcast_from', 100)->nullable();
            $table->string('subject_line', 300)->nullable();
			$table->text('broadcast_body')->nullable();
			$table->string('broadcast_template', 100)->nullable();
			$table->boolean('ready_to_send')->default(0);
			$table->boolean('sent')->default(0);
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
		Schema::drop('broadcasts');
	}

}
