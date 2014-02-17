<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('owner_id')->unsigned();
			$table->string('product_name', 250)->index();
			$table->text('product_description')->nullable();
			$table->float('product_price')->nullable();
			$table->string('product_category', 100)->nullable()->index();
			$table->string('product_sku', 20)->nullable()->index();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}