<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->index();
            $table->string('role')->index();

            $table->timestamps();
            $table->softDeletes();
//            $table->increments('id');
//            $table->string('role_name');
//            // $table->date('role_start');
//            // $table->date('role_end');
//            $table->text('role_description');
//            $table->timestamps();
//            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }

}

