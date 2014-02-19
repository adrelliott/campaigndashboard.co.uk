<?php

use Illuminate\Database\Migrations\Migration;

class AddFieldToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
        {
            $table->string('password');
            $table->unique('email');
            $table->tinyInteger('status')->unsigned()->default(3);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
        {
            $table->dropColumn('password');
        });
	}

}