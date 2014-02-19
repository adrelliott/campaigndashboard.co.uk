<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notes', function(Blueprint $table) {
			$table->increments('id');
			$table->datetime('deleted_at')->nullable();
			$table->integer('owner_id');
			$table->integer('contact_id');
			$table->integer('user_id')->nullable();
			$table->integer('order_id')->nullable();
			$table->integer('lead_id')->nullable();
			$table->string('note_name', 150)->nullable();
			$table->text('note_body')->nullable();
			$table->string('note_type', 100);
			$table->string('note_category', 100)->nullable();
			$table->string('note_status', 100)->nullable();
			$table->boolean('seen');
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
		Schema::drop('notes');
	}

}
