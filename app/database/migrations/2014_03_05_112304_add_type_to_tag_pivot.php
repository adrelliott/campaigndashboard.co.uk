<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTypeToTagPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tag_pivot', function(Blueprint $table) {
			$table->string('relationship_type')->nullable()->after('tag_start_timestamp');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tag_pivot', function(Blueprint $table) {
			$table->dropColumn('relationship_type');
		});
	}

}
