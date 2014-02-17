<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActionsTable extends Migration {

	public function up()
	{
		Schema::create('actions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
            $table->integer('owner_id')->unsigned()->index();
			$table->integer('contact_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('order_id')->unsigned()->nullable();
			$table->integer('lead_id')->unsigned()->nullable();
			$table->string('action_name', 150)->nullable()->index();
			$table->text('action_description')->nullable();
			$table->string('action_type', 100);
			$table->string('action_category', 100)->nullable();
			$table->string('action_status', 100)->nullable();
			$table->datetime('action_end_timestamp')->nullable();
			$table->datetime('action_start_timestamp')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('actions');
	}
}