<?php

use Illuminate\Database\Migrations\Migration;

class AddQtyEtcToOrdersProducts extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders_products', function($table)
        {
            $table->string('variant')->nullable()->after('product_id');
            $table->smallInteger('quantity')->nullable()->after('product_id');
            $table->integer('price')->nullable()->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_products', function($table)
        {
            $table->dropColumn('variant');
            $table->dropColumn('quantity');
            $table->dropColumn('price');
        });
    }

}