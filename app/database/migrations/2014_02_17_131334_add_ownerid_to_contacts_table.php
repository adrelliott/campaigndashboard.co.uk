<?php

use Illuminate\Database\Migrations\Migration;

class AddOwneridToContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contacts', function($table)
        {
            $table->integer('owner_id')->unsigned();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contacts', function($table)
        {
            $table->dropColumn('owner_id');
        });
	}

}