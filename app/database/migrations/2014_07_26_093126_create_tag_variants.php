<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagVariants extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_variants', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('contact_id')->index();
			$table->integer('tag_id')->index();
			$table->string('variant_name');
			$table->string('variant_value');
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tag_variants');
    }

}
