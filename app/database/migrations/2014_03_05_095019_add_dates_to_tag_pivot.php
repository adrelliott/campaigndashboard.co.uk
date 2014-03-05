<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddDatesToTagPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tag_pivot', function(Blueprint $table) {
			$table->datetime('tag_start_timestamp')->after('user_id')->nullable();
			$table->datetime('tag_end_timestamp')->after('user_id')->nullable();
            $table->text('tag_note')->after('user_id')->nullable();
			$table->string('variant')->after('user_id')->nullable();
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
			$table->dropColumn('tag_start_timestamp');
			$table->dropColumn('tag_end_timestamp');
            $table->dropColumn('tag_note');
			$table->dropColumn('variant');
		});
	}

}
