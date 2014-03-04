<?php

use Illuminate\Database\Migrations\Migration;

class AddOrderdateToOrders extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function($table)
        {
            $table->date('order_date')->nullable()->after('order_total');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders', function($table)
        {
            $table->dropColumn('order_date');
        });
	}

}