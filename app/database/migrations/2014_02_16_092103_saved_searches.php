<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class SavedSearches extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('saved_searches', function(Blueprint $table) {
			$table->increments('id');
            $table->datetime('deleted_at')->nullable();
			$table->integer('user_id')->unsigned()->index();
            $table->integer('owner_id')->unsigned()->index();

             // Define FK
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Define the rest of the cols
			$table->string('search_title');
			$table->string('search_description');
			$table->string('search_category');
			$table->text('search_query');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('saved_searches');
	}

}
