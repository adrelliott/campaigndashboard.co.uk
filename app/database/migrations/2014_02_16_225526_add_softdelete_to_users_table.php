<?php

use Illuminate\Database\Migrations\Migration;

class AddSoftdeleteToUsersTable extends Migration {

	public function up()
    {
        Schema::table('users', function($table) {
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('deleted_at');
        });
    }

}