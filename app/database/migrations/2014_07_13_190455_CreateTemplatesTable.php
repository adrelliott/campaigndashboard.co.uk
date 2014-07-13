<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('templates', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('owner_id')->unsigned()->index();
            $table->text('template_name');
            $table->text('template_description')->nullable();
            $table->string('mailchimp_id', 256)->nullable();
            $table->text('template_thumbnail')->nullable();
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
		Schema::drop('templates');
	}

}
