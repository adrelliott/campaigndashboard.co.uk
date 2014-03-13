<?php

use Illuminate\Database\Migrations\Migration;

class RenameOrdersProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('orders_products', 'order_product');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::rename('order_product', 'orders_products');
	}

}