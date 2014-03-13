<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->datetime('deleted_at')->nullable();
			$table->integer('owner_id')->unsigned()->index();
			$table->integer('contact_id')->unsigned()->index();
			$table->integer('user_id')->nullable()->unsigned()->index();
			$table->integer('lead_id')->nullable()->unsigned()->index();

            // Define FK
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');

            // Define the rest of the cols
			$table->string('order_title', 100)->nullable();
			$table->string('payment_method', 50)->nullable();
            $table->string('order_source', 100)->nullable();
			$table->string('order_reference', 100)->nullable();
			$table->text('order_notes')->nullable();
			$table->float('order_total')->nullable();
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
		Schema::drop('orders');
	}

}
