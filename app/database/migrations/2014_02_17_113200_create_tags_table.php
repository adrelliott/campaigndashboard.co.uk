<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTable extends Migration {

	public function up()
	{
		Schema::create('tags', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('owner_id')->unsigned();
			$table->string('tag_name', 250)->index();
			$table->string('tag_category', 100)->nullable();
			$table->text('tag_description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('tags');
	}
}