<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
//			$table->datetime('deleted_at')->nullable();
			$table->integer('owner_id')->unsigned()->index();
			$table->string('product_title', 250);
			$table->text('product_description')->nullable();
			$table->float('product_price')->nullable()->unigned();
			$table->string('product_category', 100)->nullable();
			$table->string('product_sku', 20)->nullable();
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
		Schema::drop('products');
	}

}
