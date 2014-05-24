<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotContactTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_tag', function(Blueprint $table) {
			$table->increments('id'); 
//            $table->datetime('deleted_at')->nullable();
            $table->integer('owner_id')->unsigned()->index();

            // Define FK
			$table->integer('contact_id')->unsigned()->index();
			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            // Define the rest of the columns
            $table->string('tag_note')->nullable();
            $table->timestamps();
            $table->softDeletes();
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_tag');
	}

}
