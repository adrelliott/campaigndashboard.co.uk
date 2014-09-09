<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSeasonToContactOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contact_role', function(Blueprint $table) {
            $table->string('role_variant', 500)->nullable();
            $table->date('role_start_date')->nullable();
			$table->date('role_end_date')->nullable();
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
			
		});
	}

}
