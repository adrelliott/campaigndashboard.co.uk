<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('actions', function(Blueprint $table) {
			$table->foreign('contact_id')->references('id')->on('contacts')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('actions', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('actions', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('actions', function(Blueprint $table) {
			$table->foreign('lead_id')->references('id')->on('leads')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('actions', function(Blueprint $table) {
			$table->dropForeign('actions_contact_id_foreign');
		});
		Schema::table('actions', function(Blueprint $table) {
			$table->dropForeign('actions_user_id_foreign');
		});
		Schema::table('actions', function(Blueprint $table) {
			$table->dropForeign('actions_order_id_foreign');
		});
		Schema::table('actions', function(Blueprint $table) {
			$table->dropForeign('actions_lead_id_foreign');
		});
	}
}