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
			$table->integer('owner_id');
			$table->integer('contact_id');
			$table->integer('user_id')->nullable();
			$table->integer('lead_id')->nullable();
			$table->string('order_title', 100)->nullable();
			$table->string('payment_method', 50)->nullable();
			$table->string('order_source', 100)->nullable();
			$table->text('order_notes')->nullable();
			$table->float('order_total')->nullable();
			$table->string('temp_item', 150)->nullable();
			$table->string('temp_season', 50)->nullable();
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
