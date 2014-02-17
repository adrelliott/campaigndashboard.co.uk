<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeadsTable extends Migration {

	public function up()
	{
		Schema::create('leads', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('owner_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('leads');
	}
}