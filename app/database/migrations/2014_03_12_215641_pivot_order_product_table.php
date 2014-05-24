<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotOrderProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_product', function(Blueprint $table) {
			$table->increments('id');
//            $table->datetime('deleted_at')->nullable();
            $table->integer('owner_id')->unsigned()->index();
			$table->integer('order_id')->unsigned()->index();
			$table->integer('product_id')->unsigned()->index();

            // Define FK
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
            // Define the rest of the columns
            $table->string('variant', 100)->nullable();
            $table->integer('quantity')->nullable()->unsigned();
            $table->integer('tax')->nullable();
            $table->integer('price')->nullable();
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
		Schema::drop('order_product');
	}

}
