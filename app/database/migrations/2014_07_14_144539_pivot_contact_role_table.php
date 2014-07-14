<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotContactRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_role', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('contact_id')->unsigned()->index();
			$table->integer('role_id')->unsigned()->index();
            $table->integer('owner_id')->unsigned()->index();
            
            $table->timestamps();
            $table->softDeletes();
            
			$table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_role');
	}

}
