<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_pivot', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('owner_id')->unsigned()->nullable();
            $table->integer('tag_id')->unsigned()->nullable();
			$table->integer('contact_id')->unsigned()->nullable();
			$table->integer('action_id')->unsigned()->nullable();
            $table->integer('broadcast_id')->unsigned()->nullable();
			$table->integer('campaign_id')->unsigned()->nullable();
			$table->integer('lead_id')->unsigned()->nullable();
			$table->integer('note_id')->unsigned()->nullable();
			$table->integer('order_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable();
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
		Schema::drop('tag_pivot');
	}

}
