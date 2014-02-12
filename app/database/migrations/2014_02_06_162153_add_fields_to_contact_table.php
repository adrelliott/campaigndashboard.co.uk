<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFieldsToContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contacts', function(Blueprint $table) {
            $table->string('mobile')->nullable();
            $table->string('landline')->nullable();
            $table->string('office')->nullable();
            $table->string('overseas')->nullable();
			$table->string('mobile2')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contacts', function(Blueprint $table) {
            $table->dropColumn('mobile');
            $table->dropColumn('landline');
            $table->dropColumn('office');
            $table->dropColumn('overseas');
			$table->dropColumn('mobile2');
		});
	}

}
