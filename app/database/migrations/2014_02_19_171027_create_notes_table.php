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
//			$table->datetime('deleted_at')->nullable();
			$table->integer('owner_id')->unsigned()->index();
			$table->integer('contact_id')->unsigned()->index();
			$table->integer('user_id')->nullable()->unsigned()->index();
			$table->integer('order_id')->nullable()->unsigned()->index();
			$table->integer('lead_id')->nullable()->unsigned()->index();

            // Define FK
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');

            // Define the rest of the cols
			$table->string('note_title', 150)->nullable();
			$table->text('note_body')->nullable();
			$table->string('note_type', 100)->nullable();
			$table->string('note_category', 100)->nullable();
			$table->string('note_status', 100)->nullable();
			$table->boolean('seen')->default(0);
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
		Schema::drop('notes');
	}

}
