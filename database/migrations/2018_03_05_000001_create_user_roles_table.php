<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned(); //increments equivalent
            $table->index(['user_id']);
            $table->integer('role_id')->unsigned(); //increments equivalent
            $table->index(['role_id']);
            $table->timestamps();
            $table->softDeletes();
            $table->userstamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
            //SETTING THE PRIMARY KEYS
            $table->primary(['user_id','role_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
