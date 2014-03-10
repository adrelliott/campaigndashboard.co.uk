<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRoletitleToRoles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contact_role', function(Blueprint $table) {
			$table->string('role_title')->nullable()->after('role_note');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contact_role', function(Blueprint $table) {
			$table->dropColumn('role_title');
		});
	}

}
