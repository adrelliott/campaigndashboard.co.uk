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
			$table->string('action_title', 150)->nullable();
			$table->text('action_body')->nullable();
			$table->string('action_type', 100);
			$table->string('action_category', 100)->nullable();
			$table->string('action_status', 100)->nullable();
			$table->boolean('completed')->default(0);
			$table->datetime('action_end_timestamp')->nullable()->default('0000-01-01 00:00');
			$table->datetime('action_start_timestamp')->nullable()->default('0000-01-01 00:00');
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
