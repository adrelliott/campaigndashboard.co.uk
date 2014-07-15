<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotContactGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_group', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('owner_id')->unsigned()->index();
			$table->integer('contact_id')->unsigned()->index();
			$table->integer('group_id')->unsigned()->index();
            $table->string('group_title', 250);
            $table->string('group_category', 100)->nullable();
            $table->text('group_description')->nullable();
            $table->date('group_join')->nullable();
            $table->date('group_leave')->nullable();
            $table->timestamps();
            $table->softDeletes();
			$table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
			$table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_group');
	}

}
