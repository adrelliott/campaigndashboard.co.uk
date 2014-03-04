<?php

use Illuminate\Database\Migrations\Migration;

class AddContactIdToOrdersProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders_products', function($table)
        {
            $table->integer('contact_id')->nullable()->unsigned()->after('owner_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders_products', function($table)
        {
            $table->dropColumn('contact_id');
        });
	}

}